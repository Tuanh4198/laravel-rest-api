<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;

class StateController extends Controller
{
    public function getState(){
        $state = State::all()->pluck('name', 'id');
        return response()->json($state);
    }

    public function getCity($id){
        $city = City::where('state_id', $id)->pluck('city', 'id');
        return response()->json($city);
    }

    public function getstatebyid($id) {
        return response()->json(State::find($id), 200);
    }

    public function getCitybyid($id){
        return response()->json(City::find($id), 200);
    }

}
