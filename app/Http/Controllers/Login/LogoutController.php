<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Models\User;
use Ixudra\Curl\Facades\Curl;

class LogoutController extends Controller
{
    public function logout(Request $req){
		Auth::logout();
		return redirect()->intended('login'); 
    }
}
