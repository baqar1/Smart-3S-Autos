<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'vehicle_name',
        'part_name',
        'condition',
        'part_id',
        'phone',
        'price',
        'address',
        'workshop_name',
        'img',

    ];
}
