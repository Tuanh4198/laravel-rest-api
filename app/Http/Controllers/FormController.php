<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\CustomerModel;

class FormController extends Controller
{
    //
    public function getState(){
        $state = State::all()->pluck('name', 'id');
    	return response()->json($state);
    }

    public function getCity($id){
    	$city = City::where('state_id', $id)->pluck('city', 'id');
    	return response()->json($city);
    }

    public function formPost(Request $request)
    {
     
    	$validator = CustomerModel::make($request->all(), [
            'phone' => 'required'
        ]);
     
        if ($validator->passes()) {
            return response()->json(['success'=>'Added new records.']);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
