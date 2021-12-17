<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    private $category;
    private $product;
    private $user;
    private $menu;
    public function __construct(Category $category, Product $product, User $user, Menu $menu)
    {
        $this->category = $category;
        $this->product = $product;
        $this->user = $user;
        $this->menu = $menu;
    }
    public function index(){
        /** count thể loại hiện có trong kho*/
        $countCategory = count($this->category->All());
        $nameTable = 'Thể loại';
        /** tổng số sản phẩm có trong kho*/
        $countProduct = count($this->product->All());
        $nameProduct = "Sản phẩm";
        /** Tổng số user có trên hệ thống*/
        $countUser = count($this->user->All());
        $nameUser = 'Thành viên';
        /** Tổng số menu hiện có*/
        $countMenu = count($this->menu->All());
        $nameMenu = 'Menu';
        return view('dashboard', compact('countCategory', 'nameTable', 'countProduct','nameProduct',
        'countUser','nameUser', 'countMenu', 'nameMenu'
        ));
    }
}
