<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PotentialsController extends Controller
{
    public function list_potentials(Request $req){
		$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/getpotentials',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: dc224f4d-e027-2922-fe68-b2ba156602fb",
				"x-requested-with: XMLHttpRequest"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
        return view('frontend.pages.potentials.index')->with('datas', $data); 
    }

    public function view_potentials(Request $req){
		$id = $req->id;
		$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/view-potential/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: dc224f4d-e027-2922-fe68-b2ba156602fb",
				"x-requested-with: XMLHttpRequest"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$potential = json_decode($response);
		
		$curl_status = curl_init();
		curl_setopt_array($curl_status, array(
			CURLOPT_URL => $url.'/api/potential-status',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: dc224f4d-e027-2922-fe68-b2ba156602fb",
				"x-requested-with: XMLHttpRequest"
			),
		));
		$response_status = curl_exec($curl_status);
		$err_status = curl_error($curl_status);
		curl_close($curl_status);
		$potential_status = json_decode($response_status);
		if($potential->errors){
			return redirect('sale/potentials-list');
		}else{
			$potential = $potential->data;
			return view('frontend.pages.potentials.view_potentials',compact('potential','potential_status'));
		}
    }

    public function updatePotential(Request $request){

		$url = $request->root();
		$potential = [
			'id'     => $request->id,
            'status' => $request->status,
            'reason' => $request->reason,
            'comments' => $request->comments
		];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/update-potential',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($potential),
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
		
        if(!$response->success){
            return back()->withInput()->with('error', $response->message);
        }else{
            return redirect('sale/potentials-list')->withInput()->with('success', $response->message);
        }
    }

}