<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SpareParts;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    public function sparePartsList(){
        $records = SpareParts::get();
        return view('superadmin.spareparts.spareparts_list',compact('records'));
    }

    public function sparePartsView(SpareParts $spare){
        return view('superadmin.spareparts.spareparts_view',compact('spare'));
    }

    public function sparePartsStore(Request $request){
        $request->validate([
            'vehicle_name' => ['required', 'string', 'max:255'],
            'part_name' => ['required', 'string', 'max:255'],
            'condition' => ['required', 'string', 'max:255'],
            'part_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'price' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'workshop_name' => ['required', 'string', 'max:255'],
            'img' => ['mimes:jpeg,jpg,png,gif']
            
        ]);
        
        if($request->img){
            $imageName = time().'.'.$request->img->extension();  
     
            $request->img->move(public_path('images'), $imageName);
        }
        else{
            if($request->id){
                $spare = SpareParts::find($request->id);
                $imageName = $spare->img;
            }
            else{
                $imageName = null;
            }

        }
        
        $spare = SpareParts::updateOrCreate(
            ['id'=>$request->id],
            [
                'vehicle_name'=>$request->vehicle_name,
                'part_name'=>$request->part_name,
                'condition'=>$request->condition,
                'part_id'=>$request->part_id,
                'phone'=>$request->phone,
                'price'=>$request->price,
                'address'=>$request->address,
                'workshop_name'=>$request->workshop_name,
                'img'=>$imageName
            ]
        );
        if($spare){
            return redirect()->route('spare.parts.list')->with('success','New Spare Part created successfully');

        }
        else{
            return redirect()->route('spare.parts.list')->with('error','Something went wrong');
        }
    }

    public function sparePartsDelete(SpareParts $spare){
        $spare->delete();
        return redirect()->route('spare.parts.list')->with('success','Spare Part deleted successfully');
    }
}
