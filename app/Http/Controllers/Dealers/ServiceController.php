<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
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
    public function serviceStore(Smart $smart, ServiceStoreRequest $request){

        $validated = $request->validated();

        $service = $smart->saveService($validated);
        
        $message = ($request['id'])?'Service updated successfully':'New Service created successfully';
                
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
