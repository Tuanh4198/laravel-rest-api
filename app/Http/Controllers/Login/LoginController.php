<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Ixudra\Curl\Facades\Curl;

class LoginController extends Controller
{
    public function index(){
    	return view('login');
    }
	
    public function login(Request $req){
		$req->validate([
            'username' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
    	$username = $req['username'];
        $password = $req['password'];
        if (Auth::guard('web')->attempt(['email' => $username, 'password' => $password])) {
            return redirect('admin/dashboard');
        } else {
            return back()->withInput()->with('error', 'Unauthotication');
        }
    }
}
