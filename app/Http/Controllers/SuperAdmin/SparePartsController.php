<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Smart;
use App\Models\SpareParts;
use App\Models\User;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    public function sparePartsList(){
        $records = Smart::with('dealer')->where('type',2)->get();
        return view('superadmin.spareparts.spareparts_list',compact('records'));
    }

    public function sparePartsView(Smart $spare){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('superadmin.spareparts.spareparts_view',compact('spare','dealers'));
    }

    public function sparePartsStore(Request $request){
        $request->validate([
            'vehicle_name' => ['required', 'string', 'max:255'],
            'part_name' => ['required', 'string', 'max:255'],
            'part_condition' => ['required', 'string', 'max:255'],
            'part_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'workshop_name' => ['required', 'string', 'max:255'],
            //'img' => ['mimes:jpeg,jpg,png,gif'],
            'dealer_id'=>['required']
            
        ]);
        $message = '';
        
        if($request->img){
            $imageName = time().'.'.$request->img->extension();  
     
            $request->img->move(public_path('images'), $imageName);
        }
        else{
            if($request->id){
                $spare = Smart::find($request->id);
                $imageName = $spare->img;
                $message = 'Spare Part updated successfully';
            }
            else{
                $imageName = null;
                $message = 'New Spare Part created successfully';
            }

        }
        
        $spare = Smart::updateOrCreate(
            ['id'=>$request->id],
            [
                'vehicle_name'=>$request->vehicle_name,
                'part_name'=>$request->part_name,
                'part_condition'=>$request->part_condition,
                'part_id'=>$request->part_id,
                'phone'=>$request->phone,
                'price'=>$request->price,
                'address'=>$request->address,
                'workshop_name'=>$request->workshop_name,
                'img'=>$imageName,
                'dealer_id'=>$request->dealer_id,
                'type'=>2
            ]
        );
        if($spare){
            return redirect()->route('spare.parts.list')->with('success',$message);

        }
        else{
            return redirect()->route('spare.parts.list')->with('error','Something went wrong');
        }
    }

    public function sparePartsDelete(Smart $spare){
        $spare->delete();
        return redirect()->route('spare.parts.list')->with('success','Spare Part deleted successfully');
    }
}
