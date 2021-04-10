<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Projects;

class ProjectTracker extends Model
{
    //
    protected $table = "project_tracker";

    protected $fillable = [
        'id_user', 
        'site_inspection_scheduled',
        'site_inspection_completed',
        'project_accepted',
        'discom_application',
        'finance_application',
        'components_received',
        'installation',
        'compliance',
        'discom_commissioning_application',
        'commissioned'
    ];

	public static function getDataProjectTracker($id){
		$data_tracker = ProjectTracker::select('project_tracker.*')
			->where('project_tracker.id_user','=',$id)
			->first();
		$data_project = Projects::select('project.*','inspection.bank_id','inspection.emi')
			->join('inspection' ,'inspection.id','=','project.site_inspection_id')
			->where('projects.id_user','=',$id)
			->first();
		return [$data_tracker,$data_project];
    }
}
