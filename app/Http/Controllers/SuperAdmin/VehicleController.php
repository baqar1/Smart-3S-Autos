<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleStoreRequest;
use App\Models\Smart;
use App\Models\SmartImage;
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
        $imageCount = SmartImage::where('image_id',$vehicle->id)->count();
        return view('superadmin.vehicles.vehicle_view',compact('vehicle','dealers','imageCount'));
    }
    public function vehicleStore(VehicleStoreRequest $request, Smart $smart){

        $validated = $request->validated();
        
        $vehicle = $smart->saveVehicle($validated);
        
        $message = '';
        
        if($request->id){

            $imageCount = SmartImage::where('image_id',$request->id)->count();
                if($imageCount <= 0){
                    $vehicle->update(['status'=>0]);
                    return redirect()->back()->with('error','You must upload image to publish this Vehicle');
                }
                $vehicle->update(['status'=>1]);
                $message = 'Vehicle updated successfully';
        }
        else{
            $message = 'New Vehicle created successfully, but must upload images to publish';
            return redirect(route('vehicle.view',[$vehicle->id]))->with('success',$message);
            
        }

        if($vehicle){
            return redirect()->route('vehicle.list')->with('success',$message);

        }
        else{
            return redirect()->route('vehicle.list')->with('error','Something went wrong');
        }

    }
    public function vehicleDelete(Smart $vehicle){
        $vehicle->delete();
        SmartImage::where('image_id',$vehicle->id)->delete();
        return redirect()->route('vehicle.list')->with('success','Vehicle deleted successfully');
    }
}
