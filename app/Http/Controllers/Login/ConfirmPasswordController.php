<?php

namespace App\Http\Controllers\Login; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
     public function index(){
    	return view('email');
    }
    public function confirm(){
    	return view('home');
    }
}
