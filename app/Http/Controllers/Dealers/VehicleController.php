<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleStoreRequest;
use App\Models\Smart;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function vehicleList(){
        $records = Smart::where('dealer_id',Auth::user()->id)->where('type',3)->get();
        return view('dealers.vehicles.vehicle_list',compact('records'));
    }

    public function vehicleView(Smart $vehicle){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('dealers.vehicles.vehicle_view',compact('vehicle','dealers'));
    }
    public function vehicleStore(VehicleStoreRequest $request, Smart $smart){
        $validated = $request->validated();
        
        $vehicle = $smart->saveVehicle($validated);

        if($request->id){
            $imageValidation = ($request->image==null)? '':'required';
        }
        else{
            $imageValidation = 'required'; 
        }
       
      
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
      

        if($vehicle){
            return redirect()->route('dealers.vehicle.list')->with('success',$message);

        }
        else{
            return redirect()->route('dealers.vehicle.list')->with('error','Something went wrong');
        }

    }
    public function vehicleDelete(Smart $vehicle){
        $vehicle->delete();
        return redirect()->route('dealers.vehicle.list')->with('success','Vehicle deleted successfully');
    }
}
