<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    private $user;
    private $role;
    public  function __construct(User  $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $dataUser = $this->user->paginate(10);
        return view('admin.users.index', compact('dataUser'));
    }
    public function create(){
        $dataRole = $this->role->all();
        return view('admin.users.add', compact('dataRole') );
    }
    public function store(Request $request){
        $user = $this->user->create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)
        ]);
        $roleIds = $request->role_id;
        $user->roles()->attach($roleIds);
        return redirect()->route('users.index');
//        foreach ($roleIds as $roleItem){
//            DB::table('role_user')->insert([
//                'role_id' => $roleItem,
//                'user_id'=> $user->id,
//            ]);
//        }
    }

}
