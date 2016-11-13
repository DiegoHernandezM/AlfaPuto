<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Products;
use App\Providers;
use App\Category;


class ProductController extends Controller
{
    //muestra los productos que hay en la bd en products/index
    public function index(Request $request)
    {
       // dd($request->get('name'));
        $product = Products::name($request->get('name'))->orderBy('id', 'desc')->paginate(5);
        return view('admin.products.index', compact('product'));
    }

    //agregamos un nuevo producto
    public function create()
    {
        $providers = Providers::orderBy('id', 'desc')->pluck('name', 'id');
        $category = Category::orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.products.create', compact('providers', 'category'));
    }

    //guarda un nuevo producto
    public function store(Request $request)
    {

        $this->validate($request, [
          'name' => 'required',
          'slug' => 'required',
          'description' => 'required',
          'extract' => 'required',
          'image' => 'required',
          'price' => 'required',

        ]);
            $filePhotoSlider = $request->file('image');

            $namePhotoProduct = 'product-' . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
            \Storage::disk('local-products')->put($namePhotoProduct, \File::get($filePhotoSlider));

            $product = new Products();
            $product->fill($request->all());
            $product->image = $namePhotoProduct;

            Image::make('img/products/'.$namePhotoProduct)->resize(280, 380)->save('img/products/'.$namePhotoProduct);

            if( $product->save() ) {
                return redirect()->route('admin.products.index');

            }

    }

    public function show(Products $product)
    {
        return $product;
    }

    public function edit(Products $product)
    {
        $providers = Providers::orderBy('id', 'desc')->pluck('name', 'id');
        $category = Category::orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.products.edit', compact('providers', 'category',  'product'));
    }

    public function update(Request $request, Products $product)
    {
        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));

        $updated = $product->save();
        return redirect()->route('admin.products.index');
        //return view('admin.products.index', compact('product'));

    }

    public function destroy(Products $product)
    {
        $deleted = $product->delete();

        return redirect()->route('admin.products.index');
    }
}
