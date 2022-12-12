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
    public function saveService($request){
        $service = self::updateOrCreate(
            ['id'=>$request['id'] ],
                [
                    'service_name'=>$request['service_name'],
                    'price'=>$request['price'],
                    'service_date'=>$request['service_date'],
                    'service_time'=>$request['service_time'],
                    'vehicle_type'=>$request['vehicle_type'],
                    'vehicle_name'=>$request['vehicle_name'],
                    'vehicle_number'=>$request['vehicle_number'],
                    'vehicle_model'=>$request['vehicle_model'],
                    'service_detail'=>$request['service_detail'],
                    'dealer_id'=>$request['dealer_id'],
                    'type'=>1
                ]
        );
        return $service;

    }

    public function saveSpareParts($request){
        $spare = self::updateOrCreate(
            ['id'=>$request['id']],
            [
                'vehicle_name'=>$request['vehicle_name'],
                'part_name'=>$request['part_name'],
                'part_condition'=>$request['part_condition'],
                'part_id'=>$request['part_id'],
                'phone'=>$request['phone'],
                'price'=>$request['price'],
                'address'=>$request['address'],
                'workshop_name'=>$request['workshop_name'],
                //'img'=>$imageName,
                'dealer_id'=>$request['dealer_id'],
                'type'=>2
            ]
        );
        return $spare;

    }

    public function saveVehicle($request){
        $vehicle = Smart::updateOrCreate(
            ['id'=>$request['id'] ],
            [
                'vehicle_name' => $request['vehicle_name'],
                'vehicle_model' => $request['vehicle_model'],
                'color' => $request['color'],
                'fuel_average' => $request['fuel_average'],
                'mileage' => $request['mileage'],
                'features' => $request['features'],
                'vehicle_description' => $request['vehicle_description'],
                'phone' => $request['phone'],
                'price' => $request['price'],
                'address' => $request['address'],
                //'image_id' => $imageName,
                'dealer_id'=>$request['dealer_id'],
                'type'=>3
            ]
        );
        return $vehicle;

    }
    
}
