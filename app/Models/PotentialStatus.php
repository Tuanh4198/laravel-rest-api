<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PotentialStatus extends Model
{
    protected $table = "status_potentials";

    protected $fillable = [
        'name_status'
    ];
	
	public static function getDataPotentialStatus(){ 
		$data = PotentialStatus::get();
		return $data; 
    }
}
