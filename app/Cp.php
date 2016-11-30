<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cp extends Model
{
    protected $table = 'cps';

    protected $fillable = ['name','colonies_id'];


    public static function towns($id){
        return Town::where('colonies_id','=',$id)
            ->get();
    }
}
