<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class CustomerController extends Controller
{
    //

    public function getCustomer(Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getcustomer')->get();
        $arr = json_decode($response);
        return view('frontend.pages.salecompliance.customer')->with('customer', $arr);
    }
}
