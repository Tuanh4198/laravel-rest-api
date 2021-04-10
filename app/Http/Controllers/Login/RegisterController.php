<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class RegisterController extends Controller
{
    public function index(){
    	return view('register');
    }

    public function login(){
    	return view('home');
    }
    
    public function register2(){
    	return view('register2');
    }
}
