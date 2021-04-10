<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;
use DB;
use validate;
use App\Models\CustomerModel;
use App\Models\UserModel;
use Session;

class SiteInspection extends Controller
{
    public function view_inspection($id, Request $req){
        $url = $req->root();
        $bank = Curl::to($url.'/api/getbank')->get();
        $arr_bank = json_decode($bank);
        $response = Curl::to($url.'/api/view-inspection/'.$id)->get();
        $arr = json_decode($response);
        return view('frontend.pages.inspection.site_inspection')->with('value', $arr)->with('bank', $arr_bank);
    }

    public function list_inspection(Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getinspection')->get();
        $arr = json_decode($response);
        return view('frontend.pages.inspection.list_site_inspection')->with('inspection', $arr);
    }

    public function submitInspection(Request $request){
        $id = $request->id;
		$url = $request->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/submit-inspection',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode(['id'=>$id]),
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json",
				"x-requested-with: XMLHttpRequest"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$response = json_decode($response);
		if($response->success){
			return redirect('sale/potentials-list')->withInput()->with('success', $response->message);
		}else{
			return redirect()->back()->withInput()->withErrors($response->message);
		}
		
    }

}