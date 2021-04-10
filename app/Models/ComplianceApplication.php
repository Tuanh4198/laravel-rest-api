<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplianceApplication extends Model
{
    protected $table = "compliance_application";

    protected $fillable = [
        'id_project',
        'c_date_scheduled',
        'compliance_completed'
    ];
}
