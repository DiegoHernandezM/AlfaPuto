<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colony extends Model
{
    protected $table = 'colonies';

    protected $fillable = ['name','town_id'];


    public static function towns($id){
        return Town::where('town_id','=',$id)
            ->get();
    }
}
