<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appln extends Model
{
    //
    protected $table = 'application';
    public $timestamps = false;

    public static function saveAppln($params){
        $appln = new Appln();
        $appln->firstName = $params['firstName'];
        $appln->lastName = $params['lastName'];
        $appln->appln = $params['appln'];
        $appln->occupation = $params['occupation'];
        $appln->save();
    } 
    public static function updateAppln($params,$id){
        return DB::table('application')
                    ->where('id', $id)
                    ->update($params);
    }
    public static function getAll(){
        return Appln::get();
    }
}
 