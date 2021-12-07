<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionsController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function index(){
        $permission = $this->permission->paginate(10);
        return view('admin.permissions.index', compact('permission'));
    }
    //    data permissions
    public function create(){
        return view('admin.permissions.add');
    }
    public function store(Request $request){
        $permission = $this->permission->create([
            'name' => $request->module_parent,
            'display_name'=> $request->module_parent,
            'parent_id' => 0
        ]);
        foreach ($request->module_childrent as $value){
            $this->permission->create([
                'name' => $value,
                'display_name'=> $value,
                'parent_id' => $permission->id,
                'key_code' =>$request->module_parent.'_'.$value
            ]);
        }
        return redirect()->route('permissions.index');
    }
}
