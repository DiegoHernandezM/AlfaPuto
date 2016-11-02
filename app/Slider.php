<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Slider extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = ['img_name', 'title', 'dec'];
    public $timestamps = true;

   
}
