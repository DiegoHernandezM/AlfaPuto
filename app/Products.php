<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'visible', 'price', 'provider_id', 'category_id'];

   /* public function setImageAttribute($image){

        $name = Carbon::now()->second.$image->getClientOriginalName();
        $this->attributes['image'] = $name;
        \Storage::disk('local')->put($name, \File::get($image));
    }*/
    public function scopeName($query, $name){

        if(trim($name) !=''){
            $query->where(\DB::raw("CONCAT( name, '', slug)"),"LIKE","%$name%");
        }


    }

    // Relation with Category
    public function provider()
    {
        return $this->belongsTo('App\Providers');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Relation with OrderItem
    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }
}
