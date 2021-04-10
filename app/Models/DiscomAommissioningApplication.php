<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscomAommissioningApplication extends Model
{
    protected $table = "discom_commissioning_application";

    protected $fillable = [
        'id_project',
        'application_completed',
        'd_date_scheduled'
    ];
}
