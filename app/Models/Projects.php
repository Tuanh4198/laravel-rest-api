<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Projects extends Model
{
    //
    protected $table = "projects";

    protected $fillable = [
        'id_user', 
        'site_inspection_id',
        'effective_system_size'
    ];


    public static function getDataProjects(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->get();
		  return $data; 
    }

    public static function getDataProjectsDiscom(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('discom_application', 1)
        ->get();
        return $data; 
    }    

    public static function getDataProjectsFinance(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('finance_application', 1)
        ->get();
        return $data; 
    }    

    public static function getDataProjectsComponents(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('components', 1)
        ->get();
        return $data; 
    }    

    public static function getDataProjectsInstallation(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('installation', 1)
        ->get();
        return $data; 
    }    

    public static function getDataProjectsCompliance(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('compliance', 1)
        ->get();
        return $data; 
    }    

    public static function getDataProjectsCommissioning(){
      $data = Projects::select('inspection.created_at as created_date','users.name','projects.*')
        ->join('inspection','inspection.id','=' ,'projects.site_inspection_id')
        ->join('users' ,'users.id','=','projects.id_user')
        ->where('discom_commissioning_application', 1)
        ->get();
        return $data; 
    }

	  public static function getDataProjectsById($id){
  		$data = Projects::select('projects.*')->where('projects.id','=',$id)->first();
  		return $data; 
    }

    public static function project_status_flow($id) {
      $data = DB::table('projects')
        ->join('discom_commissioning_application','discom_commissioning_application.id_project','=','projects.id')
        ->join('installation_application','installation_application.id_project','=','projects.id')
        ->join('commission_application','commission_application.id_project','=','projects.id')
        ->join('compliance_application','compliance_application.id_project','=','projects.id')
        ->join('components_application','components_application.id_project','=','projects.id')
        ->join('finance_application','finance_application.id_project','=','projects.id')
        ->join('discom_application','discom_application.id_project','=','projects.id')
        ->where('projects.id','=',$id)
        ->first();
      return $data;
    }

    public static function get_installer($id_installer) {
      $data = DB::table('projects')
        ->join('installation_application' ,'installation_application.id_project','=','projects.id')
        ->join('users' ,'users.id','=','installation_application.assign_installer')
        ->where('installation_application.assign_installer','=',$id_installer)
        ->get();
      return $data;
    }

    public static function view_installer($id_project) {
      $data = DB::table('projects')
        ->join('installation_application','installation_application.id_project','=','projects.id')
        ->join('users','users.id','=','installation_application.assign_installer')
        ->join('inspection','inspection.id_user','=','projects.id_user')
        ->where('projects.id','=',$id_project)
        ->first();
      return $data;
    }
	
	public static function getDataRevenueProjects($type){
		if($type == 'commissioned'){
			$today = self::getDataRevenueCommissioned(1);
			$yesterday = self::getDataRevenueCommissioned(1,1);
			$twodaysago = self::getDataRevenueCommissioned(1,2);
			$fourdaysago = self::getDataRevenueCommissioned(1,3);
			$yeardaysago = self::getDataRevenueCommissioned(1,4);
			$sixdaysago = self::getDataRevenueCommissioned(1,5);
			$sevendaysago = self::getDataRevenueCommissioned(1,6);
		}else{
			$today = self::getDataRevenueCommissioned(0);
			$yesterday = self::getDataRevenueCommissioned(0,1);
			$twodaysago = self::getDataRevenueCommissioned(0,2);
			$fourdaysago = self::getDataRevenueCommissioned(0,3);
			$yeardaysago = self::getDataRevenueCommissioned(0,4);
			$sixdaysago = self::getDataRevenueCommissioned(0,5);
			$sevendaysago = self::getDataRevenueCommissioned(0,6);
		}
		$data = [$sevendaysago,$sixdaysago,$yeardaysago,$fourdaysago,$twodaysago,$yesterday,$today];
		return $data;
    }
	
	public static function getDataRevenueCommissioned($commissioned,$time = null){
		if($time){
			if($commissioned == 0){
				$data = Projects::select('inspection.emi','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->join('inspection','inspection.id','=','projects.site_inspection_id')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->sum('inspection.emi');
			}else{
				$data = Projects::select('inspection.emi','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->join('inspection','inspection.id','=','projects.site_inspection_id')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.updated_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->sum('inspection.emi');
			}
			
		}else{
			if($commissioned == 0){
				$data = Projects::select('inspection.emi','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->join('inspection','inspection.id','=','projects.site_inspection_id')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->sum('inspection.emi');
			}else{
				$data = Projects::select('inspection.emi','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->join('inspection','inspection.id','=','projects.site_inspection_id')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->sum('inspection.emi');
			}
		}
		return $data;
	}
	
	public static function getDataSystemsProjects($type){
		if($type == 'commissioned'){
			$today = self::getDataSystemsCommissioned(1);
			$yesterday = self::getDataSystemsCommissioned(1,1);
			$twodaysago = self::getDataSystemsCommissioned(1,2);
			$fourdaysago = self::getDataSystemsCommissioned(1,3);
			$yeardaysago = self::getDataSystemsCommissioned(1,4);
			$sixdaysago = self::getDataSystemsCommissioned(1,5);
			$sevendaysago = self::getDataSystemsCommissioned(1,6);
		}else{
			$today = self::getDataSystemsCommissioned(0);
			$yesterday = self::getDataSystemsCommissioned(0,1);
			$twodaysago = self::getDataSystemsCommissioned(0,2);
			$fourdaysago = self::getDataSystemsCommissioned(0,3);
			$yeardaysago = self::getDataSystemsCommissioned(0,4);
			$sixdaysago = self::getDataSystemsCommissioned(0,5);
			$sevendaysago = self::getDataSystemsCommissioned(0,6);
		}
		$data = [$sevendaysago,$sixdaysago,$yeardaysago,$fourdaysago,$twodaysago,$yesterday,$today];
		return $data;
    }
	
	public static function getDataSystemsCommissioned($commissioned,$time = null){
		if($time){
			if($commissioned == 0){
				$data = Projects::select('projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->get();
			}else{
				$data = Projects::select('projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.updated_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->get();
			}
			
		}else{
			if($commissioned == 0){
				$data = Projects::select('inspection.emi','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->join('inspection','inspection.id','=','projects.site_inspection_id')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->get();
			}else{
				$data = Projects::select('projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->get();
			}
		}
		return count($data);
	}
	
	public static function getDataSystemsSizeProjects($type){
		if($type == 'commissioned'){
			$today = self::getDataSystemsSizeCommissioned(1);
			$yesterday = self::getDataSystemsSizeCommissioned(1,1);
			$twodaysago = self::getDataSystemsSizeCommissioned(1,2);
			$fourdaysago = self::getDataSystemsSizeCommissioned(1,3);
			$yeardaysago = self::getDataSystemsSizeCommissioned(1,4);
			$sixdaysago = self::getDataSystemsSizeCommissioned(1,5);
			$sevendaysago = self::getDataSystemsSizeCommissioned(1,6);
		}else{
			$today = self::getDataSystemsSizeCommissioned(0);
			$yesterday = self::getDataSystemsSizeCommissioned(0,1);
			$twodaysago = self::getDataSystemsSizeCommissioned(0,2);
			$fourdaysago = self::getDataSystemsSizeCommissioned(0,3);
			$yeardaysago = self::getDataSystemsSizeCommissioned(0,4);
			$sixdaysago = self::getDataSystemsSizeCommissioned(0,5);
			$sevendaysago = self::getDataSystemsSizeCommissioned(0,6);
		}
		$data = [$sevendaysago,$sixdaysago,$yeardaysago,$fourdaysago,$twodaysago,$yesterday,$today];
		return $data;
    }
	
	public static function getDataSystemsSizeCommissioned($commissioned,$time = null){
		if($time){
			if($commissioned == 0){
				$data = Projects::select('projects.effective_system_size','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->sum('projects.effective_system_size');
			}else{
				$data = Projects::select('projects.effective_system_size','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.updated_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->sum('projects.effective_system_size');
			}
			
		}else{
			if($commissioned == 0){
				$data = Projects::select('projects.effective_system_size','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->sum('projects.effective_system_size');
			}else{
				$data = Projects::select('projects.effective_system_size','projects.site_inspection_id','projects.commissioned','projects.updated_at','projects.created_at')
				->where('projects.commissioned','=',$commissioned)
				->whereDate('projects.created_at', '=', date('Y-m-d'))
				->sum('projects.effective_system_size');
			}
		}
		return $data;
	}
}





