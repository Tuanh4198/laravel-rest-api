<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Models\DataInstaller;
use Illuminate\Support\MessageBag;
use Session;

class InstallerController extends Controller
{
    //
    public function getInstaller(Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getinstaller')->get();
        $arr = json_decode($response);
        return view('frontend.pages.salecompliance.installer')->with('installer', $arr);
    }

    public function formInstaller(){
        return view('frontend.pages.salecompliance.forminstaller');
    }

    public function updateIns(Request $req)
    {
        $url = $req->root();

        $installer = [
			'id_user' => $req->id_user,
            'installer_name' => $req->installer_name,
            'installer_contact_name'=> $req->installer_contact_name,
            'installer_phone'=> $req->installer_phone,
            'installer_adr_1'=> $req->installer_adr_1,
            'installer_adr_2'=> $req->installer_adr_2,
            'installer_state'=> $req->installer_state,
            'installer_city'=> $req->installer_city,
            'installer_pincode'=> $req->installer_pincode,
            'installer_number_of_project'=> $req->installer_number_of_project,
            'installer_total_installer'=> $req->installer_total_installer,
            'installer_maximum_installer'=> $req->installer_maximum_installer,
            'installer_number_of_employees'=> $req->installer_number_of_employees,
            'installer_maximum_distance'=> $req->installer_maximum_distance
        ];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/updateins',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($installer),
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
        return redirect('admin/getinstaller')->withInput()->with('success', $response->message);
    }

    public function addInstaller(Request $req){
        $url = $req->root();
        $installer_user = [
            'name' => $req->installer_contact_name,
            'email' => $req->installer_email,
            'password' => $req->password,
            'password_confirmation' => $req->confirm_password,
            'phone' => $req->installer_phone,
            'active' => 1,
            'user_type' => 3
        ];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/auth/signup',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($installer_user),
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: 725011d9-e3ee-c7c2-6642-d72480972fc1",
				"x-requested-with: XMLHttpRequest"
			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);
		curl_close($curl);
		
        if (isset($response->errors)) {
			$message = '';
			foreach ($response->errors as $key => $value) {
				$message = $value[0];
				break;
			}
			$errors = new MessageBag(['errors' => $message]);
			return redirect()->back()->withInput()->withErrors($errors);
        }
        $id = $response->id;

        $installer = [
            'id_user'        => $id,
            'installer_name' => $req->installer_name,
            'installer_contact_name'=> $req->installer_contact_name,
            'installer_phone'=> $req->installer_phone,
            'installer_email'=> $req->installer_email,
            'installer_adr_1'=> $req->installer_adr_1,
            'installer_adr_2'=> $req->installer_adr_2,
            'installer_state'=> $req->installer_state,
            'installer_city'=> $req->installer_city,
            'installer_pincode'=> $req->installer_pincode,
            'installer_number_of_project'=> $req->installer_number_of_project,
            'installer_total_installer'=> $req->installer_total_installer,
            'installer_maximum_installer'=> $req->installer_maximum_installer,
            'installer_number_of_employees'=> $req->installer_number_of_employees,
            'installer_maximum_distance'=> $req->installer_maximum_distance
        ];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url.'/api/addinstaller',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($installer),
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: 725011d9-e3ee-c7c2-6642-d72480972fc1",
				"x-requested-with: XMLHttpRequest"
			),
		));

		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);
		curl_close($curl);
        return redirect('admin/getinstaller')->withInput()->with('success', $response->message);

    }

    public function deleteInstaller(Request $req, $id) {

        $url = $req->root();
        $response_user = Curl::to($url.'/api/deleteinstaller/'.$id)->get();
        $arr = json_decode($response_user);
        return redirect('admin/getinstaller')->with('success', 'Record deleted successfully!');
    }

    public function editInstaller($id, Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getinstaller/'.$id)->get();
        $user = json_decode($response);
        return view('frontend.pages.salecompliance.forminstaller')->with('user', $user);   
    }

}
