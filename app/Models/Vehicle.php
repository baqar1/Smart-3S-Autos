<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model_name',
        'color',
        'fuel_average',
        'mileage',
        'features',
        'discription',
        'phone',
        'price',
        'address',
        'image',
        'dealer_id',
    ];

    public function dealer(){
        return $this->belongsTo(User::class);
    }
}
