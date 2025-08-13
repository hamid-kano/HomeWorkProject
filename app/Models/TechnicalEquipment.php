<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalEquipment extends Model
{
    protected $fillable = [
        'name',
        'type',
        'model',
        'serial_number',
        'purchase_date',
        'warranty_date',
        'status',
        'location',
        'cost',
        'supplier',
        'maintenance_schedule',
        'notes'
    ];
}