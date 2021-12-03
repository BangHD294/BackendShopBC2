<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUsersController extends Controller
{
    use DeleteModelTrait;
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
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password)
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . 'Line: ' .$exception->getLine());
        }

//        foreach ($roleIds as $roleItem){
//            DB::table('role_user')->insert([
//                'role_id' => $roleItem,
//                'user_id'=> $user->id,
//            ]);
//        }
    }
    public function edit($id){
        $dataRole = $this->role->all();
        $dataUser = $this->user->find($id);
        $roleUser = $dataUser->roles;
        return view('admin.users.edit', compact('dataRole','dataUser', 'roleUser'));
    }
    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' .$exception->getMessage() . 'Line: ' .$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }

}
