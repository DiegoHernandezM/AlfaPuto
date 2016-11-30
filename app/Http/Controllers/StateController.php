<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\State;
use App\Town;
use App\Colony;
use App\Cp;

class StateController extends Controller
{
    public function index()
    {
        $states = State::orderBy('id', 'desc')->pluck('name', 'id');
        return View('auth.register')->with($states);
    }

    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $towns = Town::towns($id);
            return response()->json($towns);
        }
    }
    public function getColonies(Request $request, $id){
        if($request->ajax()){
            $colonies = Colony::colonies($id);
            return response()->json($colonies);
        }
    }
    public function getCps(Request $request, $id){
        if($request->ajax()){
            $cps = Cp::cps($id);
            return response()->json($cps);
        }
    }
}
