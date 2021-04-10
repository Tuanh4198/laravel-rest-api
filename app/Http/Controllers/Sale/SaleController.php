<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Models\Projects;

class SaleController extends Controller
{
    public function index(Request $req){
    	$url = $req->root();
		$curl_contact = curl_init();
		curl_setopt_array($curl_contact, array(
			CURLOPT_URL => $url.'/api/getcontact',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));
		$response_contact = curl_exec($curl_contact);
		$err = curl_error($curl_contact);
		curl_close($curl_contact);
		$customer = json_decode($response_contact);


		$curl_contact_confirm = curl_init();
		curl_setopt_array($curl_contact_confirm, array(
			CURLOPT_URL => $url.'/api/getscheduled',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_contact_confirm = curl_exec($curl_contact_confirm);
		$err_contact_confirm = curl_error($curl_contact_confirm);
		curl_close($curl_contact_confirm);
		$contact_confirm = json_decode($response_contact_confirm);

		$curl_project = curl_init();
		curl_setopt_array($curl_project, array(
			CURLOPT_URL => $url.'/api/getproject',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_project = curl_exec($curl_project);
		$err_project = curl_error($curl_project);
		curl_close($curl_project);
		$projects = json_decode($response_project);


		$curl_discom = curl_init();
		curl_setopt_array($curl_discom, array(
			CURLOPT_URL => $url.'/api/get-compare-discom',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_discom = curl_exec($curl_discom);
		$err_discom = curl_error($curl_discom);
		curl_close($curl_discom);
		$discom = json_decode($response_discom);		

		$curl_finance = curl_init();
		curl_setopt_array($curl_finance, array(
			CURLOPT_URL => $url.'/api/get-compare-finance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_finance = curl_exec($curl_finance);
		$err_finance = curl_error($curl_finance);
		curl_close($curl_finance);
		$finance = json_decode($response_finance);		

		$curl_components = curl_init();
		curl_setopt_array($curl_components, array(
			CURLOPT_URL => $url.'/api/get-compare-components',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_components = curl_exec($curl_components);
		$err_components = curl_error($curl_components);
		curl_close($curl_components);
		$components = json_decode($response_components);		

		$curl_installation = curl_init();
		curl_setopt_array($curl_installation, array(
			CURLOPT_URL => $url.'/api/get-compare-installation',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_installation = curl_exec($curl_installation);
		$err_installation = curl_error($curl_installation);
		curl_close($curl_installation);
		$installation = json_decode($response_installation);		

		$curl_compliance = curl_init();
		curl_setopt_array($curl_compliance, array(
			CURLOPT_URL => $url.'/api/get-compare-compliance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_compliance = curl_exec($curl_compliance);
		$err_compliance = curl_error($curl_compliance);
		curl_close($curl_compliance);
		$compliance = json_decode($response_compliance);		

		$curl_commissioning = curl_init();
		curl_setopt_array($curl_commissioning, array(
			CURLOPT_URL => $url.'/api/get-compare-commissioning',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",

		));
		$response_commissioning = curl_exec($curl_commissioning);
		$err_commissioning = curl_error($curl_commissioning);
		curl_close($curl_commissioning);
		$commissioning = json_decode($response_commissioning);

		// dd($discom);

        return view('frontend.pages.saledashboard',compact('customer','contact_confirm', 'projects', 'discom', 'finance', 'components', 'installation', 'compliance', 'commissioning'));
    }
}