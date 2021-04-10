<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Auth;
use App\Models\Projects;

class InstallerController extends Controller
{
	public function index(){
		$id_installer = Auth::user()->id;
		$proj_installer = Projects::get_installer($id_installer);
		return view('frontend.pages.installerdashboard')->with('proj_installer', $proj_installer);
	}

	public function view_installer($id){
		$proj_detail = Projects::view_installer($id);
		return view('frontend.pages.project.view_installer')->with('proj_detail', $proj_detail);
	}

}
