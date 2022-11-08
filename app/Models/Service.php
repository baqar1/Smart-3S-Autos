<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "service_name", 
        "service_charges", 
        "service_date",
        "service_time",
        "vehicle_type",
        "vehicle_model",
        "vehicle_name",
        "vehicle_number",
        "dealer_id",
        "service_detail"
    ];
    
    public function dealer(){
        return $this->belongsTo(User::class);
    }
}
