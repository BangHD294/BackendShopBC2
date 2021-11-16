<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.product.index');
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
        foreach ($request->tags as $tagItem){
            $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
//            $this->productTag->create([
//               'product_id' => $productData->id,
//                'tag_id' => $tagInstance->id
//            ]);
            $tagId[] = $tagInstance->id;
        }
        $productData->tags()->attach($tagId);
    }
}
