<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Smart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function serviceList(){
        $records = Smart::where('dealer_id',Auth::user()->id)->where('type',1)->get();
        return view('dealers.services.service_list',compact('records'));
    }
    public function serviceView(Smart $service){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('dealers.services.service_view',compact('service','dealers'));
    }
    public function serviceStore(Smart $service, Request $request){
        $request->validate([
            'service_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'service_date' => ['required', 'string', 'max:255'],
            'service_time' => ['required', 'string', 'max:255'],
            'vehicle_type' => ['required', 'string', 'max:255'],
            'vehicle_name' => ['required', 'string', 'max:255'],
            'vehicle_number' => ['required', 'string', 'max:255'],
            'dealer_id'=>['required']
            
        ]);
        $message = ($request->id)?'Service updated successfully':'New Service created successfully';
        
        $service = Smart::updateOrCreate(
            ['id'=>$request->id],
            [
                'service_name'=>$request->service_name,
                'price'=>$request->price,
                'service_date'=>$request->service_date,
                'service_time'=>$request->service_time,
                'vehicle_type'=>$request->vehicle_type,
                'vehicle_name'=>$request->vehicle_name,
                'vehicle_number'=>$request->vehicle_number,
                'vehicle_model'=>$request->vehicle_model,
                'service_detail'=>$request->service_detail,
                'dealer_id'=>$request->dealer_id,
                'type'=>1
            ]
        );
        if($service){
            return redirect()->route('dealers.service.list')->with('success',$message);

        }
        else{
            return redirect()->route('dealers.service.list')->with('error','Something went wrong');
        }
    }

    public function serviceDelete(Smart $service){
        $service->delete();
        return redirect()->route('dealers.service.list')->with('success','Service deleted successfully');
    }
}
