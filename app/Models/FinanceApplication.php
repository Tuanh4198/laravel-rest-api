<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceApplication extends Model
{
    protected $table = "finance_application";

    protected $fillable = [
        'id_project',
        'f_application_submitted',
        'f_status'
    ];
}
