<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function vehicleList(){
        $records = Vehicle::where('dealer_id',Auth::user()->id)->get();
        return view('dealers.vehicles.vehicle_list',compact('records'));
    }

    public function vehicleView(Vehicle $vehicle){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('dealers.vehicles.vehicle_view',compact('vehicle','dealers'));
    }
    public function vehicleStore(Request $request){
        if($request->id){
            $imageValidation = ($request->image==null)? '':'required';
        }
        else{
            $imageValidation = 'required'; 
        }
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'model_name' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'fuel_average' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'string', 'max:30'],
            'features' => ['required', 'string', 'max:255'],
            'discription' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,jpg,png,gif',$imageValidation],
            'dealer_id'=>['required']    
        ]);
        $message = '';
        
        if($request->image){
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('images'), $imageName);
        }
        else{
            if($request->id){
                $vehicle = Vehicle::find($request->id);
                $imageName = $vehicle->image;
                $message = 'Vehicle updated successfully';
            }
            else{
                $imageName = null;
                $message = 'New Vehicle created successfully';
            }

        }
        $vehicle = Vehicle::updateOrCreate(
            ['id'=>$request->id],
            [
                'name' => $request->name,
                'model_name' => $request->model_name,
                'color' => $request->color,
                'fuel_average' => $request->fuel_average,
                'mileage' => $request->mileage,
                'features' => $request->features,
                'discription' => $request->discription,
                'phone' => $request->phone,
                'price' => $request->price,
                'address' => $request->address,
                'image' => $imageName,
                'dealer_id'=>$request->dealer_id,
            ]
        );

        if($vehicle){
            return redirect()->route('dealers.vehicle.list')->with('success',$message);

        }
        else{
            return redirect()->route('dealers.vehicle.list')->with('error','Something went wrong');
        }

    }
    public function vehicleDelete(Vehicle $vehicle){
        $vehicle->delete();
        return redirect()->route('vehicle.list')->with('success','Vehicle deleted successfully');
    }
}
