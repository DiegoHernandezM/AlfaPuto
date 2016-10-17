<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    protected $table = 'providers';

    protected $fillable = ['name', 'contact', 'RFC', 'telefono', 'celular', 'email', 'direccion'];

    public $timestamps = false;

    
}
