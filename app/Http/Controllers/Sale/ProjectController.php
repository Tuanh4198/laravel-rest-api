<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function projectList(Request $req){
    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/getproject',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	return view('frontend.pages.project.projectlist')->with('data', $data);
    }

    public function projectDetail(Request $req, $id){
		$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url."/api/getProjectStatusFlow/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$projects = json_decode($response);
		//
		if($projects->errors){
			return redirect('sale/project-list');
		}else{
			$project = $projects->data;
			return view('frontend.pages.project.projectdetail')->with('projects', $project);
		}
    }
    public function getCompareDiscom(Request $req){
    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-discom',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.discom')->with('data', $data);
    }    

    public function getCompareFinance(Request $req){
    	    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-finance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.finance')->with('data', $data);

    }    

    public function getCompareComponents(Request $req){
    	    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-components',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.components')->with('data', $data);

    }    

    public function getCompareInstallation(Request $req){
    	    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-installation',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.installation')->with('data', $data);

    }    

    public function getCompareCompliance(Request $req){
    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-compliance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.compliance')->with('data', $data);

    }    

    public function getCompareCommissioning(Request $req){
    	$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/get-compare-commissioning',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data = json_decode($response);
    	
    	return view('frontend.pages.saledashboard.commissioning')->with('data', $data);

    }

}