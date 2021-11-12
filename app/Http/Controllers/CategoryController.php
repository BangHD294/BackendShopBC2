<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $htmlSelect;

    public function __construct()
    {
        $this->htmlSelect = " ";
    }

    public function create()
    {
        $data = Category::all();
//        foreach ($data as $value){
//            if ($value['parent_id']==0){
//                echo "<option>" .$value['name'] . "</option>";
//                foreach ($data as $value2){
//                    if ($value2['parent_id'] == $value['id']){
//                        echo "<option>" .$value2['name'] . "</option>";
//                    }
//                }
//            }
//        }
        $htmlOption = $this->categoryRecusive(0);
        return view('category.add', compact('htmlOption'));

    }

//    đệ quy để lấy ra danh mục
    function categoryRecusive($id, $text = '')
    {
        $data = Category::all();
        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                $this->htmlSelect .= "<option>" . $text . $value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text . '-');
            }
        }
        return $this->htmlSelect;
    }


    public function index()
    {
        return view('category.index');
    }
}