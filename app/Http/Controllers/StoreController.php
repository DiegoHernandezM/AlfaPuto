<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;
use App\Slider;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    //
    public function index(){


        $products = Products::inRandomOrder()->get();
        $sliders = Slider::all();
    	//dd($products);
    return view('store.index', compact('products', 'sliders'));
    }

    public function questions(){

    	return view('store.questions');
    }

    public function about(){
    	return view('store.about');
    }

    public function contact(){
    	return view('store.contact');
    }

    public function mapsite(){
    	return view('store.mapsite');
    }

    public function privacy(){
    	return view('store.privacy');
    }

 
    public function show($slug){

    	$product = Products::where('slug',$slug)->first();
    	//dd($product);
    	return view('store.show', compact('product'));
    }


}
