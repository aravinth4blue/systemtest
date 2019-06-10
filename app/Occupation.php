<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Occupation extends Model
{
    //
    protected $table = 'occupationData';

    public static function getAll(){
        return DB::table('occupationData')->get();
    }

}

