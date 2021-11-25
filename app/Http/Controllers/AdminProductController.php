<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\This;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function index(){
        $product = $this->product->latest()->paginate(10);
        return view('admin.product.index', compact('product'));
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId='');

        return view('admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);// truyen du lieu sang cho Recusive.php
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $dataProducts = [
                'name' => $request->name,
                'price' => $request->price,
                'content' =>$request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)){
                $dataProducts['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProducts['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $productData =  $this->product->create($dataProducts);
            // insert data to product_images
            if ($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $productData->images()->create([
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name' =>$dataProductImageDetail['file_name'],
                    ]);

                }
            }
            // insert tags for product
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
//            $this->productTag->create([
//               'product_id' => $productData->id,
//                'tag_id' => $tagInstance->id
//            ]);
                    $tagId[] = $tagInstance->id;
                }
            }

            $productData->tags()->attach($tagId);
            DB::commit();
            return redirect()->route('product.index');

        }catch (Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage(). 'line : ' .$exception->getLine());

        }

    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }
    public function update(Request  $request, $id){
        try {
            DB::beginTransaction();
            $dataProductsUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' =>$request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)){
                $dataProductsUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductsUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductsUpdate);
            $productData = $this->product->find($id);
            // insert data to product_images
            if ($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $productData->images()->create([
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name' =>$dataProductImageDetail['file_name'],
                    ]);

                }
            }
            // insert tags for product
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
//            $this->productTag->create([
//               'product_id' => $productData->id,
//                'tag_id' => $tagInstance->id
//            ]);
                    $tagId[] = $tagInstance->id;
                }
            }

            $productData->tags()->sync($tagId);
            DB::commit();
            return redirect()->route('product.index');

        }catch (Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage(). 'line : ' .$exception->getLine());

        }
    }
    public function delete($id){
        try {
            $this->product->find($id)->delete();
            return Response()->json([
                'code'=>200,
                'message'=>'success'
            ], 200);

        }catch ( \Exception $exception){
            Log::error('Message: ' .$exception->getMessage(). 'line : ' .$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }

    }
}
