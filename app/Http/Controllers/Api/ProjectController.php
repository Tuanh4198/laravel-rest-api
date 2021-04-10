<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\ProjectTracker;
use App\Models\CustomerModel;
use App\Models\Potentials;
use App\Models\CommissionApplication;
use App\Models\DiscomAommissioningApplication;
use App\Models\ComplianceApplication;
use App\Models\ComponentsApplication;
use App\Models\InstallationApplication;
use App\Models\FinanceApplication;
use App\Models\DiscomApplication;
use DB;

class ProjectController extends Controller
{
    //
    public function getRevenue(Request $request){
		$type = $request->type;
		if($type == 'commissioned'){
			$data = Projects::getDataRevenueProjects($type);
		}else{
			$data = Projects::getDataRevenueProjects($type);
		}
		$max = max($data);
		$response = [
			'data' => $data,
			'max' => $max+1000000
		];
		return response()->json($response, 200); 
    }
	
	public function getSystems(Request $request){
		$type = $request->type;
		if($type == 'commissioned'){
			$data = Projects::getDataSystemsProjects($type);
		}else{
			$data = Projects::getDataSystemsProjects($type);
		}
		$max = max($data);
		$response = [
			'data' => $data,
			'max' => $max+10
		];
		return response()->json($response, 200); 
    }
	public function getSystemsSize(Request $request){
		$type = $request->type;
		if($type == 'commissioned'){
			$data = Projects::getDataSystemsSizeProjects($type);
		}else{
			$data = Projects::getDataSystemsSizeProjects($type);
		}
		$max = max($data);
		$response = [
			'data' => $data,
			'max' => $max+10
		];
		return response()->json($response, 200); 
    }
	
	public function getPotentialCarbonSavings(Request $request){ 
		$type = $request->type;
		if($type == 'commissioned'){
			$data = Potentials::getDataPotentialCarbonSavings($type);
		}else{
			$data = Potentials::getDataPotentialCarbonSavings($type);
		}
		$max = max($data);
		$response = [
			'data' => $data,
			'max' => $max+10
		];
		return response()->json($response, 200); 
    }
	
	public function getNumberOfQueries(){
		$data = CustomerModel::getDataNumberOfQueries();
		$max = max($data);
		$response = [
			'data' => $data,
			'max' => $max+10
		];
		return response()->json($response, 200); 
    }

    public function getProject(){
        return response()->json(Projects::getDataProjects(), 200); 
    }    

    public function getCompareDiscom(){
        return response()->json(Projects::getDataProjectsDiscom(), 200); 
    }    

    public function getCompareFinance(){
        return response()->json(Projects::getDataProjectsFinance(), 200); 
    }    

    public function getCompareComponents(){
        return response()->json(Projects::getDataProjectsComponents(), 200); 
    }    

    public function getCompareInstallation(){
        return response()->json(Projects::getDataProjectsInstallation(), 200); 
    }    

    public function getCompareCompliance(){
        return response()->json(Projects::getDataProjectsCompliance(), 200); 
    }    

    public function getCompareCommissioning(){
        return response()->json(Projects::getDataProjectsCommissioning(), 200); 
    }
    
    public function getProjectByID($id) {
        $data = Projects::getDataProjectsById($id);
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

    public function getProjectStatusFlow($id) {
        $data = Projects::project_status_flow($id);
        if(isset($data->id)){
            $data = [
                'errors' => null,
                'data' => $data
            ];
        }else{
            $data = [
                'errors' => 1,
                'data' => $data
            ];
        }
        return response()->json($data, 200);
    }

    public function editProjectStatusFlow(Request $req ) {
        $id = $req->id;
        $name = $req->name;
        $value = $req->value;
        $model = $req->model;
        $data = Projects::project_status_flow($id);
        if ($data == null) {
            return response()->json([
                'errors' => 'Project not found!'
            ], 200);
        }
        $id_user = $data->id_user;

        if ($data->discom_application == 0 || $data->finance_application == 0) {
            if ($model == "DiscomApplication") {
                DiscomApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->d_application_submitted != 0 && $data_new->d_status != 'Denied') {
                    Projects::where('id',$id)->update([
                        'discom_application' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['discom_application' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'DiscomApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } elseif ($model == "FinanceApplication") {
                FinanceApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->f_application_submitted != 0 && $data_new->f_status != 'Denied') {
                    Projects::where('id',$id)->update([
                        'finance_application' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['finance_application' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'FinanceApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Please complete Discom Application and Finance Application.'
                ], 200);
            }
        } elseif ($data->components == 0) {
            if ($model == 'ComponentsApplication') {
                if ($name == 'panels_received') {
                    if ($data->panels_ordered != 0) {
                        if ($data->panels_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'inverter_received') {
                    if ($data->inverter_ordered != 0) {
                        if ($data->inverter_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'frame_received') {
                    if ($data->frame_ordered != 0) {
                        if ($data->frame_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'wire_received') {
                    if ($data->wire_ordered != 0) {
                        if ($data->wire_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'accessories_received') {
                    if ($data->accessories_ordered != 0) {
                        if ($data->accessories_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'monitoring_system_received') {
                    if ($data->monitoring_system_ordered != 0) {
                        if ($data->monitoring_system_received != 0) {
                            return response()->json([
                                'errors' => 'Cannot be corrected!'
                            ], 200);
                        }
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Please confirm Ordered in complete'
                        ], 200);
                    }
                } if ($name == 'panels_ordered') {
                    if ($data->panels_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                } if ($name == 'inverter_ordered') {
                    if ($data->inverter_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                } if ($name == 'frame_ordered') {
                    if ($data->frame_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                } if ($name == 'wire_ordered') {
                    if ($data->wire_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                } if ($name == 'accessories_ordered') {
                    if ($data->accessories_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                } if ($name == 'monitoring_system_ordered') {
                    if ($data->monitoring_system_ordered == 0 ) {
                        ComponentsApplication::where('id_project',$id)->update([
                            $name => $value
                        ]);
                    } else {
                        return response()->json([
                            'errors' => 'Cannot be corrected!'
                        ], 200);
                    }
                }
                $data_new = Projects::project_status_flow($id);
                if ($data_new->panels_received != 0 && $data_new->inverter_received != 0 && $data_new->frame_received != 0 && $data_new->wire_received != 0 && $data_new->accessories_received != 0 && $data_new->monitoring_system_received != 0) {
                    Projects::where('id',$id)->update([
                        'components' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['components_received' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'ComponentsApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Please complete Components Application.'
                ], 200);
            }
        } elseif ($data->installation == 0) {
            if ($model == 'InstallationApplication') {
                InstallationApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->assign_installer != null && $data_new->i_date_scheduled != null && $data_new->installation_completed !=0) {
                    Projects::where('id',$id)->update([
                        'installation' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['installation' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'InstallationApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Please complete Installation Application.'
                ], 200);
            }
        } elseif ($data->compliance == 0) {
            if ($model == 'ComplianceApplication') {
                ComplianceApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->c_date_scheduled != null && $data_new->compliance_completed != 0) {
                    Projects::where('id',$id)->update([
                        'compliance' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['compliance' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'ComplianceApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Please complete Compliance Application.'
                ], 200);
            }
        } elseif ($data->discom_commissioning_application == 0) {
            if ($model == 'DiscomAommissioningApplication') {
                DiscomAommissioningApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->d_date_scheduled != null && $data_new->application_completed != 0) {
                    Projects::where('id',$id)->update([
                        'discom_commissioning_application' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['discom_commissioning_application' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'DiscomAommissioningApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Please complete DISCOM Commissioning Application.'
                ], 200);
            }
        } elseif ($data->commissioned == 0) {
            if ($model == 'CommissionApplication') {
                CommissionApplication::where('id_project',$id)->update([
                    $name => $value
                ]);
                $data_new = Projects::project_status_flow($id);
                if ($data_new->commissioned != 0) {
                    Projects::where('id',$id)->update([
                        'commissioned' => 1
                    ]);
                    ProjectTracker::where('id_user','=',$id_user)->update(['commissioned' => 1]);
                    return response()->json([
                        'errors' => null,
                        'message' => 'Successful!',
                        'model' => 'CommissionApplication',
                        'status' => 1
                    ], 200);
                }
                return response()->json([
                    'errors' => null,
                    'message' => 'Successful!',
                    'model' => null
                ], 200);
            } else {
                return response()->json([
                    'errors' => 'Cannot be corrected!'
                ], 200);
            }
        } else {
            return response()->json([
                'errors' => 'Cannot be corrected!'
            ], 200);
        }
    }
}