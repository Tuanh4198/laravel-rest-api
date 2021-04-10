<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentsApplication extends Model
{
    protected $table = "components_application";

    protected $fillable = [
        'id_project',
        'panels_ordered',
        'panels_received',
        'inverter_ordered',
        'inverter_received',
        'frame_ordered',
        'frame_received',
        'wire_ordered',
        'wire_received',
        'accessories_ordered',
        'accessories_received',
        'monitoring_system_ordered',
        'monitoring_system_received'
    ];
}
