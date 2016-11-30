<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index(Request $request)
    {
        $categories = Category::name($request->get('name'))->orderBy('id', 'desc')->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
        ]);
        
        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            
        ]);
        
        $categories = Category::all();
        //dd($categories);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Category $category)
    {
               
    $categories = Category::all();
     return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $updated = $category->save();
       $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
         $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
}

