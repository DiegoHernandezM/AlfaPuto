<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    protected $table = 'providers';

    protected $fillable = ['name', 'contact', 'RFC', 'telefono', 'celular', 'email', 'direccion'];

    public $timestamps = false;

    public function scopeName($query, $name){
        if(trim($name) !=''){
            $query->where(\DB::raw("CONCAT( name, '', email)"),"LIKE","%$name%");
        }
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
