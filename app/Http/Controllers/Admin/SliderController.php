<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.panel-slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.panel-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $filePhotoSlider = $request->file('img_name');

            $namePhotoProduct = 'slider-' . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
            \Storage::disk('local')->put($namePhotoProduct, \File::get($filePhotoSlider));

            $slider = new Slider();
            $slider->fill($request->all());
            $slider->img_name = $namePhotoProduct;

            Image::make('img/sliders/'.$namePhotoProduct)->resize(880, 490)->save('img/sliders/'.$namePhotoProduct);

            if( $slider->save() ) {
                return redirect()->route('admin.sliders.index');

            }

           
        // abort(500);

    }
/**
     * Elimina un Slider del sistema
     * mediante su identificador
     * @param $id
     */
    public function destroy(Request $request, Slider $slider) {
        $deleted = $slider->delete();
        return redirect()->route('admin.sliders.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $id = $request->idUp;
        DB::beginTransaction();
        try {

            $slider=Slider::findOrFail($id);
            $filePhotoSlider = $request->file('img_name');

            if ($filePhotoSlider != null) {

                $namePhotoProduct = 'slider-' . \Auth::user()->id . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
                \Storage::disk('local')->put($namePhotoProduct, \File::get($filePhotoSlider));
                
                $slider->fill($request->all());
                $slider->img_name = $namePhotoProduct;

                Image::make('img/sliders/'.$namePhotoProduct)->resize(880, 490)->save('img/sliders/'.$namePhotoProduct);

                if( $slider->save() ) {
                    Session::flash('message', 'Slider actualizado.');
                    DB::commit();
                    return redirect()->route('admin.slider.index');
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('admin.slider.index');
        }
    }

    public function show()
    {
        
    }
}
