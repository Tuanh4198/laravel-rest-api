<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class CustomerController extends Controller
{
    //
	public function index(Request $req){
		$url = $req->root();
		$id_user = Auth::user()->id;
		$curl_project_tracker = curl_init();
		curl_setopt_array($curl_project_tracker, array(
			CURLOPT_URL => $url.'/api/getprojecttracker/'.$id_user,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));
		$response_project_tracker = curl_exec($curl_project_tracker);
		$err = curl_error($curl_project_tracker);
		curl_close($curl_project_tracker);
		$project_tracker = json_decode($response_project_tracker);
		// dd ($id_user);
		return view('frontend.pages.customerdashboard')->with('project_tracker', $project_tracker);
	}
}
