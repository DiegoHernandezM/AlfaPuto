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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $filePhotoSlider = $request->file('img_name');

       // if ($filePhotoSlider != null) {

            $namePhotoProduct = 'slider-' . \Auth::user()->id . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
            \Storage::disk('photo_slider')->put($namePhotoProduct, \File::get($filePhotoSlider));

            $slider = new Slider();
            $slider->fill($request->all());
            $slider->img_name = $namePhotoProduct;

            Image::make('img/sliders/'.$namePhotoProduct)->resize(880, 490)->save('img/sliders/'.$namePhotoProduct);

            if( $slider->save() ) {
                return redirect()->route('admin.slider');
            }

        //}

        // abort(500);
    }
/**
     * Elimina un Slider del sistema
     * mediante su identificador
     * @param $id
     */
    public function destroy($id) {
        Slider::destroy($id);
        Session::flash('message', 'El Slider fue eliminado.');
        return redirect()->route('admin.slider');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->idUp;
        DB::beginTransaction();
        try {

            $slider=Slider::findOrFail($id);
            $filePhotoSlider = $request->file('img_name');

            if ($filePhotoSlider != null) {

                $namePhotoProduct = 'slider-' . \Auth::user()->id . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
                \Storage::disk('photo_slider')->put($namePhotoProduct, \File::get($filePhotoSlider));
                
                $slider->fill($request->all());
                $slider->img_name = $namePhotoProduct;

                Image::make('media/photo-slider/'.$namePhotoProduct)->resize(880, 490)->save('media/photo-slider/'.$namePhotoProduct);

                if( $slider->save() ) {
                    Session::flash('message', 'Slider actualizado.');
                    DB::commit();
                    return redirect()->route('admin.slider');
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('admin.slider');
        }
    }

    public function show($id)
    {
        return Slider::where('id', $id)
            ->select('*')
            ->get();
    }
}
