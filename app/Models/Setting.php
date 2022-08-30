<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\CommonMark\Reference\Reference;

class Setting extends Model
{
    use HasFactory;

    protected $table="settings";

    /**
     * @param array $attributes
     * @return Setting
     */
    public function updateSetting(array $attributes){
        $setting = $this->where("key",$attributes['key'])->first();
        if($setting == null){
            throw new ModelNotFoundException("Can't find setting");
        }
        $setting->value = $attributes["value"];
        $setting->save();
        return $setting;
    }

    public function getReference()
    {
        return $this->hasOne(References::class,'id','value');
    }
}
