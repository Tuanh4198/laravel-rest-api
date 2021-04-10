<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscomApplication extends Model
{
    protected $table = "discom_application";

    protected $fillable = [
        'id_project',
        'd_application_submitted',
        'd_status'
    ];
}
