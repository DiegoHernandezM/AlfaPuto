<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Providers;


class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){


        $provider = Providers::name($request->get('name'))->orderBy('id', 'desc')->paginate(5);

        //$provider = Providers::all();

        return view('admin.providers.index', compact('provider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create(){

        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'contact' => 'required',
          'RFC' => 'required',
          'telefono' =>'required|regex:[[0-9]{8}]',
          'celular' => 'required|regex:[[0-9]{8}]',
          'email' => 'required|email',
          'name' => 'required',
          'name' => 'required',
          //'color' => 'required',
        ]);
        
        $provider = Providers::create([
            'name' => $request->get('name'),
            'contact' =>$request->get('contact'),
            'RFC' => $request->get('RFC'),
            'telefono' => $request->get('telefono'),
            'celular' => $request->get('celular'),
            'email' => $request->get('email'),
            'direccion' => $request->get('direccion')
        ]);
        
        //$message = $provider ? 'Proveedor agregado correctamente!' : 'El Proveedor NO pudo agregarse!';
        //return redirect()->route('admin.providers.index')->with('message', $message);

      $provider = Providers::all();
        //dd($provider);
        return view('admin.providers.index', compact('provider'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Providers $providers)
    {
      
          $provider = Providers::all();
        //dd($provider);
        return view('admin.providers.index', compact('provider'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Providers $providers)
    {
        return view('admin.providers.edit', compact('providers'));
        //dd($providers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Providers $providers)
    {
        $this->validate($request, [
          'name' => 'required',
          'contact' => 'required',
          'RFC' => 'required',
          'telefono' => 'required',
          'celular' => 'required',
          'email' => 'required',
          'name' => 'required',
          'name' => 'required',
        ]);
        $providers->fill($request->all());
           
        $updated = $providers->save();
        
         $provider = Providers::all();
        //dd($provider);
        return view('admin.providers.index', compact('provider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Providers $providers)
    {
        $deleted = $providers->delete();
        $provider = Providers::all();
        //dd($provider);
        return view('admin.providers.index', compact('provider'));
    }
}
