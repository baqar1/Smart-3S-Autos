<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Smart;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicleList(){
        $records = Smart::with('dealer')->where('type',3)->get();
        return view('superadmin.vehicles.vehicle_list',compact('records'));
    }

    public function vehicleView(Smart $vehicle){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('superadmin.vehicles.vehicle_view',compact('vehicle','dealers'));
    }
    public function vehicleStore(Request $request){
        if($request->id){
            $imageValidation = ($request->image==null)? '':'required';
        }
        else{
            $imageValidation = 'required'; 
        }
       
        $request->validate([
            'vehicle_name' => ['required', 'string', 'max:255'],
            'vehicle_model' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'fuel_average' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'string', 'max:30'],
            'features' => ['required', 'string', 'max:255'],
            'vehicle_description' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            //'image' => ['mimes:jpeg,jpg,png,gif',$imageValidation],
            'dealer_id'=>['required']    
        ]);
        $message = '';
        
        if($request->image){
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('images'), $imageName);
        }
        else{
            if($request->id){
                $vehicle = Smart::find($request->id);
                $imageName = $vehicle->image;
                $message = 'Vehicle updated successfully';
            }
            else{
                $imageName = null;
                $message = 'New Vehicle created successfully';
            }

        }
        $vehicle = Smart::updateOrCreate(
            ['id'=>$request->id],
            [
                'vehicle_name' => $request->vehicle_name,
                'vehicle_model' => $request->vehicle_model,
                'color' => $request->color,
                'fuel_average' => $request->fuel_average,
                'mileage' => $request->mileage,
                'features' => $request->features,
                'vehicle_description' => $request->vehicle_description,
                'phone' => $request->phone,
                'price' => $request->price,
                'address' => $request->address,
                'image_id' => $imageName,
                'dealer_id'=>$request->dealer_id,
                'type'=>3
            ]
        );

        if($vehicle){
            return redirect()->route('vehicle.list')->with('success',$message);

        }
        else{
            return redirect()->route('vehicle.list')->with('error','Something went wrong');
        }

    }
    public function vehicleDelete(Smart $vehicle){
        $vehicle->delete();
        return redirect()->route('vehicle.list')->with('success','Vehicle deleted successfully');
    }
}
