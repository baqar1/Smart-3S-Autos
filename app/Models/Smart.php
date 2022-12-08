<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smart extends Model
{
    use HasFactory;
    protected $table = 'smarts';
    protected $fillable = [
        //vehicle attribute
                'vehicle_name',
                'vehicle_model', 
                'color',
                'fuel_average',
                'mileage',
                'features',
                'vehicle_description',
                'phone',
                'price',
                'address',
                'image_id',
                'dealer_id',
                'type',
                "service_name", 
                //service attribute
                //"service_charges", 
                "service_date",
                "service_time",
                "vehicle_type",
                "vehicle_model",
                "vehicle_name",
                "vehicle_number",
                "dealer_id",
                "service_detail",
                //spareparts attribute
                'part_name',
                'part_condition',
                'part_id',
                'workshop_name',
    ];

    public function order(){
        return $this->hasMany(Order::class,'smart_id','id');
    }
    public function dealer(){
        return $this->belongsTo(User::class);
    }
    
}
