<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;
use App\Providers;
use App\Category;


class ProductController extends Controller
{
    //muestra los productos que hay en la bd en products/index
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(5);
        return view('admin.products.index', compact('products'));
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
        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            'image'         => $request->get('image'),
            'visible'       => $request->has('visible') ? 1 : 0,
            'provider_id'   => $request->get('provider_id'),
            'category_id'   => $request->get('category_id')
        ];

        $products = Products::create($data);
        return view('admin.products.index', compact('products'));
    }

    public function show(Products $product)
    {
        return $product;
    }

    public function edit(Products $product)
    {
        //$categories = Providers::orderBy('id', 'desc')->lists('name', 'id');
        $providers = Providers::orderBy('id', 'desc')->pluck('name', 'id');
        $category = Category::orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.products.edit', compact('providers', 'category',  'products'));
    }

    public function update(Request $request, Products $product)
    {
        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;

        $updated = $product->save();
        return view('admin.products.index', compact('products'));
        //return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function destroy(Products $product)
    {
        $deleted = $product->delete();
        
        return view('admin.products.index', compact('products'));
    }
}
