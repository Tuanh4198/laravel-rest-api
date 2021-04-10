<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potentials extends Model
{
    protected $table = "potentials";

    protected $fillable = [
        'user_id', 
        'site_inspection_id',
        'effective_system_size',
        'status',
        'reason',
        'comments'
    ];
	
	public static function getDataPotentials(){
		$data = Potentials::select('status_potentials.name_status','users.name','users.email' ,'potentials.*')
			->join('status_potentials' ,'status_potentials.id','=','potentials.status')
			->join('users' ,'users.id','=','potentials.user_id')->get();
		return $data; 
    }
	public static function getDataPotentialsById($id){
		$data = Potentials::select('potentials.*')->where('potentials.id','=',$id)->first();
		return $data; 
    }
	
	public static function getDataPotentialCarbonSavings($type){
		if($type == 'commissioned'){
			$today = self::getDataPotentialCarbonSavingsCommissioned(1);
			$yesterday = self::getDataPotentialCarbonSavingsCommissioned(1,1);
			$twodaysago = self::getDataPotentialCarbonSavingsCommissioned(1,2);
			$fourdaysago = self::getDataPotentialCarbonSavingsCommissioned(1,3);
			$yeardaysago = self::getDataPotentialCarbonSavingsCommissioned(1,4);
			$sixdaysago = self::getDataPotentialCarbonSavingsCommissioned(1,5);
			$sevendaysago = self::getDataPotentialCarbonSavingsCommissioned(1,6);
		}else{
			$today = self::getDataPotentialCarbonSavingsCommissioned(0);
			$yesterday = self::getDataPotentialCarbonSavingsCommissioned(0,1);
			$twodaysago = self::getDataPotentialCarbonSavingsCommissioned(0,2);
			$fourdaysago = self::getDataPotentialCarbonSavingsCommissioned(0,3);
			$yeardaysago = self::getDataPotentialCarbonSavingsCommissioned(0,4);
			$sixdaysago = self::getDataPotentialCarbonSavingsCommissioned(0,5);
			$sevendaysago = self::getDataPotentialCarbonSavingsCommissioned(0,6);
		}
		$data = [$sevendaysago,$sixdaysago,$yeardaysago,$fourdaysago,$twodaysago,$yesterday,$today];
		return $data;
    }
	
	public static function getDataPotentialCarbonSavingsCommissioned($commissioned,$time = null){
		if($time){
			if($commissioned == 0){
				$data = Potentials::select('potentials.*')
					->whereIn('potentials.status', [3, 4])
					->whereDate('potentials.updated_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
					->get();
			}else{
				$data = Potentials::select('potentials.*')
					->where('potentials.status','=',2)
					->whereDate('potentials.updated_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
					->get();
			}
			
		}else{
			if($commissioned == 0){
				$data = Potentials::select('potentials.*')
					->whereIn('potentials.status', [3, 4])
					->whereDate('potentials.updated_at', '=', date('Y-m-d'))
					->get();
			}else{
				$data = Potentials::select('potentials.*')
					->where('potentials.status','=',2)
					->whereDate('potentials.updated_at', '=', date('Y-m-d'))
					->get();
			} 
		}
		return count($data);
	}
}
