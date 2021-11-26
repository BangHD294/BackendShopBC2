<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{

    public function __construct()
    {
    }

    public function index(){
        return view('admin.slider.index');
    }
    public function create(){
        return view('admin.slider.add');
    }
    public  function store(SliderRequest $request){
        return view('23123');
    }
}
