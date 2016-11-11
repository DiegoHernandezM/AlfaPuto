<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = ['price', 'quantity', 'products_id', 'order_id'];

    public $timestamps = false;

}
