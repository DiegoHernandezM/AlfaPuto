<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

	protected $fillable = ['name','description'];

	public $timestamps = false;

    public function scopeName($query, $name){
        if(trim($name) !=''){
            $query->where(\DB::raw("CONCAT( name, '', description)"),"LIKE","%$name%");
        }
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}