<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectTracker;

class ProjectTrackerController extends Controller
{
    //
    public function getProjectTracker($id){
    	return response()->json(ProjectTracker::getDataProjectTracker($id), 200);
    }
}
