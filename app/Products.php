<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'visible', 'price', 'provider_id'];


    // Relation with Category
    public function provider()
    {
        return $this->belongsTo('App\Providers');
    }

    // Relation with OrderItem
    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }
}
