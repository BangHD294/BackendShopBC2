<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\Setting;
use Couchbase\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingAdminController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index(){
        $dataSetting = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('dataSetting'));
    }

    public function create(){
        return view('admin.setting.add');
    }

    public function store(AddSettingRequest $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type'=>$request->type,
        ]);
        return redirect()->route('setting.index');
    }
    public function edit($id){
        $dataSetting = $this->setting->find($id);
        return view('admin.setting.edit', compact('dataSetting'));
    }
    public function update(Request $request,$id){
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('setting.index');

    }
    public function delete($id){
        try {
            $this->setting->find($id)->delete();
            return Response()->json([
                'code'=>200,
                'message'=>'success'
            ], 200);

        }catch (\Exception $exception){
            Log::error('Message: ' .$exception->getMessage(). 'line : ' .$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }

}
