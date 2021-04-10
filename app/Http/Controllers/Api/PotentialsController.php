<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Potentials;
use App\Models\PotentialStatus;
use App\Models\SiteInspection;
use App\Models\Projects;
use App\Models\CommissionApplication;
use App\Models\DiscomCommissioningApplication;
use App\Models\ComplianceApplication;
use App\Models\ComponentsApplication;
use App\Models\InstallationApplication;
use App\Models\FinanceApplication;
use App\Models\DiscomApplication;
use App\Models\ProjectTracker;
use validate;

class PotentialsController extends Controller
{
    public function getPotentials() {
        return response()->json(Potentials::getDataPotentials(), 200); 
    }
    
    public function getPotentialsStatus() {
        return response()->json(PotentialStatus::getDataPotentialStatus(), 200); 
    }
    
    public function viewPotentials($id) {
        $data = Potentials::getDataPotentialsById($id);

        if(isset($data->id)){
            $data = [
            'errors' => null,
            'data' => $data];
        }else{
            $data = [
            'errors' => 1,
            'data' => $data];
        }
        return response()->json($data, 200); 
    }

    public function updatePotential(Request $req){

        $id = $req->id;
		$check_potentials = Potentials::find($id);
		if(!$check_potentials){
			return response()->json(['success' => false, 'message' => 'An unknown error.'], 200);
		}
        $status = $req->status;
        $potential = [
            'id'     => $id,
            'status' => $status,
            'reason' => $req->reason,
            'comments' => $req->comments
        ];
        if($req->status == 2){
            $potential = [
                'id'     => $id,
                'status' => $status,
                'reason' => '',
                'comments' => ''
            ];
        }
        if($req->status == 1){
            return response()->json([
				'success' => false,
                'message' => 'Please change status to continue!'
            ], 200);
        }

        if($req->status == 3 || $req->status == 4){
            if(!$req->reason || !$req->comments){
                return response()->json([
					'success' => false,
                    'message' => 'Please enter all require field!'
                ], 200);
            }
        }

        Potentials::where('id',$id)->update($potential);
		$potential = Potentials::find($id);
		$projects = Projects::create([
            'id_user' => $potential->user_id,
            'site_inspection_id' => $potential->site_inspection_id,
			'effective_system_size' => $potential->effective_system_size
        ]);
		CommissionApplication::create([
            'id_project' => $projects->id
        ]);
		DiscomCommissioningApplication::create([
            'id_project' => $projects->id
        ]);
		ComplianceApplication::create([
            'id_project' => $projects->id
        ]);
		ComponentsApplication::create([
            'id_project' => $projects->id
        ]);
		InstallationApplication::create([
            'id_project' => $projects->id
        ]);
		FinanceApplication::create([
            'id_project' => $projects->id
        ]);
		DiscomApplication::create([
            'id_project' => $projects->id
        ]);
		ProjectTracker::where('id_user','=',$potential->user_id)->update(['project_accepted' => 1]);
        return response()->json([
			'success' => true,
            'message' => 'Successful confirmation.'
        ], 200);
    }
}