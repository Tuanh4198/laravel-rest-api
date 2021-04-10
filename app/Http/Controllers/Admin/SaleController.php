<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Models\User;

class SaleController extends Controller
{
    //
    public function getSale(Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getsale')->get();
        $arr = json_decode($response);
        return view('frontend.pages.salecompliance.sale')->with('sale', $arr);
    }


    public function formSale(){
        return view('frontend.pages.salecompliance.formsale');
    }


    public function addSale(Request $req){
        $url = $req->root();
        $sale = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'password_confirmation' => $req->confirm_password,
            'phone' => $req->phone,
            'active' => 1,
            'user_type' => 2,
        ];
        $response_user = Curl::to($url.'/api/auth/signup')->withData($sale)->post();
        $arr = json_decode($response_user);

        if(empty($arr)){
            return back()->withInput()->with('error', 'Email already exists!');
        }else{
            return redirect('admin/getsale')->withInput()->with('success', 'Create Account Sale and Compliance success!');
        }

    }

    public function editSale($id, Request $req){
        $url = $req->root();
        $response = Curl::to($url.'/api/getsale/'.$id)->get();
        $user = json_decode($response);
        return view('frontend.pages.salecompliance.formsale')->with('user', $user);    
    }

    public function updateSale(Request $req)
        {
            $sale = [
                'id'    => $req->id,
                'name' => $req->name,
                'email' => $req->email,
                'password' => bcrypt($req->password),
                'password_confirmation' => bcrypt($req->confirm_password),
                'phone' => $req->phone,
                'active' => 1,
                'user_type' => 2,
            ];
            $url = $req->root();
            $response_user = Curl::to($url.'/api/updatesale')->withData($sale)->post();
            $arr = json_decode($response_user);
            if(empty($arr)){
                return back()->withInput()->with('error', 'Email already exists!');
            }else{
                return redirect('admin/getsale')->withInput()->with('success', $arr->message);
            }
        }

    public function deleteSale(Request $req, $id) {

        $url = $req->root();
        $response_user = Curl::to($url.'/api/deletesale/'.$id)->get();
        $arr = json_decode($response_user);
        return redirect('admin/getsale')->withInput()->with('success', $arr->message);
    }
}