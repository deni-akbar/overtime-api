<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting){
        $this->setting = $setting;
    }

    public function update( Request $request){
        try {
            $setting = $this->setting->updateSetting($request->all());
            return response()->json($setting);
        }catch (ModelNotFoundException $exception){
            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }

}
