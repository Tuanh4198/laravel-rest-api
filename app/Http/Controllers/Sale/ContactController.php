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

class ContactController extends Controller
{
    public function get_contact(Request $req){
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
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: dc224f4d-e027-2922-fe68-b2ba156602fb",
				"x-requested-with: XMLHttpRequest"
			),
		));
		$response_contact = curl_exec($curl_contact);
		$err = curl_error($curl_contact);
		curl_close($curl_contact);
		$customer = json_decode($response_contact);
		
		$curl_contact_confirm = curl_init();
		curl_setopt_array($curl_contact_confirm, array(
			CURLOPT_URL => $url.'/api/getcontact-confirm',
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
		$response_contact_confirm = curl_exec($curl_contact_confirm);
		$err_contact_confirm = curl_error($curl_contact_confirm);
		curl_close($curl_contact_confirm);
		$contact_confirm = json_decode($response_contact_confirm);
		
        return view('frontend.pages.customer.customer',compact('customer','contact_confirm'));
	}
    public function view_contact($id, Request $req) {
        $url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/getcontact/'.$id,
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
		$response = json_decode($response);
		if(!$response->errors){
			$detail_arr = $response->data;
			return view('frontend.pages.customer.customer_detail')->with('detail_arr', $detail_arr);
		}else{
			return  redirect("error_404");
		}
       
    }

    public function confirm_contact(Request $req){
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                .'0123456789!@#$%^&*()');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
        $visit = $req->visit;
        $mail = $req->email;
        $id = $req->id;
		
        $data = [
            'contact_visit' => $visit,
            'id_user' => $req->id_user,
            'id_contact' => $id
        ];
		
		$url = $req->root();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/confirm-contact',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: 39457c15-f839-0b4f-df6c-403e09094b47",
				"x-requested-with: XMLHttpRequest"
			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);
		curl_close($curl);
		
		if($response->visit_time){
			$details = [
				'name' => $req->name,
				'visit' => $visit
			];
			\Mail::to($mail)->send(new \App\Mail\ConfirmMail($details));
		}  
		
		return redirect('sale/get-contact')->withInput()->with('success', $response->message);
    }

    public function dashboard_1(Request $req) {
        
        return view('frontend.pages.customer.customer_detail')->with('detail_arr', $detail_arr);
    }

    public function getToBeConfirm(Request $req){
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
		
        return view('frontend.pages.customer.tobeconfirm')->with('customer', $customer);
	}

	public function getConfirm(Request $req){
        $url = $req->root();
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
		
        return view('frontend.pages.customer.confirm')->with('contact_confirm', $contact_confirm);
	}


}