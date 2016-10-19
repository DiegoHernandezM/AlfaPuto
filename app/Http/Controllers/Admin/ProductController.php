<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Products;
use App\Providers;


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
        return view('admin.products.create', compact('providers'));
    }

    //guarda un nuevo producto
    public function store(SaveProductRequest $request)
    {
        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            'image'         => $request->get('image'),
            'visible'       => $request->has('visible') ? 1 : 0,
            'provider_id'   => $request->get('provider_id')
        ];

        $product = Products::create($data);
        return view('admin.products.index', compact('product'));
    }

    public function show(Products $product)
    {
        return $product;
    }

    public function edit(Products $product)
    {
        //$categories = Providers::orderBy('id', 'desc')->lists('name', 'id');
        $providers = Providers::orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.products.edit', compact('providers', 'product'));
    }

    public function update(SaveProductRequest $request, Products $product)
    {
        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;

        $updated = $product->save();
        return view('admin.products.index', compact('product'));
        //return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function destroy(Products $product)
    {
        $deleted = $product->delete();
        return view('admin.products.index', compact('product'));
    }
}
