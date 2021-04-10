<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SiteInspection;

class CustomerModel extends Model
{
    protected $table = "contact";

    protected $fillable = [
        'contact_name',
        'id_user',
        'contact_email',
        'contact_adr_1',
        'contact_adr_2',
        'contact_pincode',
        'contact_city',
        'contact_state',
        'contact_phone',
        'contact_meu',
        'contact_visit',
		'status',
        'created_at',
        'updated_at'
    ];
	
	public static function getContactById($id){
		$data = CustomerModel::select('contact.*')->where('contact.id','=',$id)->where('contact.status','=',1)->first(); 
		return $data; 
    }
	public static function getContactConFirm(){
		$data = SiteInspection::select('inspection.*','contact.contact_name','contact.contact_email','contact.contact_phone','contact.contact_visit','contact.contact_meu','contact.status')
			->join('contact' ,'contact.id_user','=','inspection.id_user')
			->where('contact.status','=',2)->get(); 
		return $data; 
    }   

    public static function getScheduled(){
        $data = SiteInspection::select('inspection.*','contact.contact_name','contact.contact_email','contact.contact_phone','contact.contact_visit','contact.contact_meu','contact.status')
            ->join('contact' ,'contact.id','=','inspection.id_contact')
            ->where('contact.status','=',2)->get(); 
        return $data; 
    }
	
	public static function getDataNumberOfQueries(){
		$today = self::getDataNumberOfQueriesCommissioned();
		$yesterday = self::getDataNumberOfQueriesCommissioned(1);
		$twodaysago = self::getDataNumberOfQueriesCommissioned(2);
		$fourdaysago = self::getDataNumberOfQueriesCommissioned(3);
		$yeardaysago = self::getDataNumberOfQueriesCommissioned(4);
		$sixdaysago = self::getDataNumberOfQueriesCommissioned(5);
		$sevendaysago = self::getDataNumberOfQueriesCommissioned(6);
		$data = [$sevendaysago,$sixdaysago,$yeardaysago,$fourdaysago,$twodaysago,$yesterday,$today];
		return $data; 
    }
	
	public static function getDataNumberOfQueriesCommissioned($time = null){
		if($time){
			$data = CustomerModel::select('contact.*')
				->whereDate('contact.created_at', '=', date('Y-m-d',strtotime('-'.$time.' days',strtotime(date('Y-m-d')))))
				->get();
		}else{
			$data = CustomerModel::select('contact.*')
				->whereDate('contact.created_at', '=', date('Y-m-d'))
				->get();
		}
		return count($data);
	}
}
