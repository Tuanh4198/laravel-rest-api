<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstallationApplication extends Model
{
    protected $table = "installation_application";

    protected $fillable = [
        'id_project',
        'assign_installer',
        'i_date_scheduled',
        'installation_completed'
    ];
}
