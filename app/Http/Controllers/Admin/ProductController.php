<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;
use App\Providers;
use App\Category;
use App\Http\Controllers\Admin;


class ProductController extends Controller
{
    //muestra los productos que hay en la bd en products/index
    public function index(Request $request)
    {
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
          'name' => ['required','max:30'],
          'slug' => 'required',
          'description' => 'required',
          'extract' => 'required',
          'price' => 'required|regex:[[0-9]{1}]',

        ]);

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


         Products::create($data);
        return redirect()->route('admin.products.index');
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
        $product->visible = $request->has('visible') ? 1 : 0;

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
