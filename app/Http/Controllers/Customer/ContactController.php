<?php

namespace App\Http\Controllers\Customer;

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
    public function addcontact(Request $req) {
        $url = $req->root();
        $phone = $req->phone;
        $mail = $req->mail;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 12; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
        $pass = $randomString;
        $name = $req->name;
        $response_state = Curl::to($url.'/api/getstatebyid/'.$req->state)->get();
        $state_name = json_decode($response_state);
        $response_city = Curl::to($url.'/api/getCitybyid/'.$req->city)->get();
        $city_name = json_decode($response_city);
        if($city_name->id == 615) { 
            $details = [
                'name' => $name,
                'mail' => $mail,
                'link' => false
            ];
            \Mail::to($mail)->send(new \App\Mail\MyTestMail($details));
            Session::put('message','Pleas check your email!');
            Session::put('status', 1);
            return redirect()->back();
        } else {
            $contact = [
                'name' => $req->name,
                'email' => $mail,
                'password' => $pass,
                'password_confirmation' => $pass,
                'phone' => $phone,
                'active' => 0,
                'user_type' => 4
            ];
            $response_user = Curl::to($url.'/api/auth/signup')->withData($contact)->post();
            $arr = json_decode($response_user);
            if ($arr == null) {
                Session::put('message', 'Email already exists!');
                Session::put('status', 0);
                return redirect()->route('getRegister');
            }
            $id = $arr->id;
            $message = $arr->message;
            $status = $arr->status;
    
            $customer = [
                'contact_name' => $name,
                'id_user' => $id,
                'contact_email' => $mail,
                'contact_adr_1' => $req->adr_line_1,
                'contact_adr_2' => $req->adr_line_2,
                'contact_pincode' => $req->pincode,
                'contact_phone' => $phone,
                'contact_city' => $city_name->city,
                'contact_state' => $state_name->name,
                'contact_meu' => $req->meu.' '.$req->optionsRadios[0],
                'contact_visit' => $req->date
            ];
            $response_contact = Curl::to($url.'/api/createcontact')->withData($customer)->post();
    
            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                    .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                    .'0123456789!@#$%^&*()');
            shuffle($seed);
            $rand = '';
            foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
            $details = [
                'name' => $name,
                'mail' => $mail,
                'pass' => $pass,
                'id' => $id,
                'rand' => $rand,
                'link' => true
            ];
            \Mail::to($mail)->send(new \App\Mail\MyTestMail($details));
    
            Session::put('message',$message);
            Session::put('status',$status);
            return redirect()->route('login');

        }
    }

    public function active_account($id, $rand_str, Request $req) {
        $url = $req->root();
        $response = Curl::to($url.'/api/activeaccount/'.$id.'/'.$rand_str)->withData(['active'=>1])->post();
        $arr = json_decode($response);
        $message = $arr->message;
        Session::put('message',$message);
        return redirect()->route('login');
    }

    public function dashboard_1(Request $req) {
        
        return view('frontend.pages.customer.customer_detail')->with('detail_arr', $detail_arr);
    }
}