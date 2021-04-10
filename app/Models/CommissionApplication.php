<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionApplication extends Model
{
    protected $table = "commission_application";

    protected $fillable = [
        'id_project',
        'commissioned'
    ];
}
