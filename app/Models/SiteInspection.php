<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteInspection extends Model
{
    protected $table = "inspection";

    protected $fillable = [
        'id_user', 
        'id_contact',
        'img',
		'existing_home',
        'document_1',
        'document_2',
        'document_3',
        'daily_kwh',
        'system_size',
        'effective_kw',
        'TPC',
        'EMI',
      	'average_monthly_usage',
        'average_sun_hours',
        'bill_offset',
        'potential_install_area',
        'small_leg',
        'large_leg',
        'number_of_rows',
        'deposit',
        'down_payment',
        'of_months',
        'interest',
        'bank_name',
        'bank_branch'
    ];

}
