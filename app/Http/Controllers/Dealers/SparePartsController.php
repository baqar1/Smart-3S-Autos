<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Models\SpareParts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparePartsController extends Controller
{
    public function sparePartsList(){
        $records = SpareParts::where('dealer_id',Auth::user()->id)->get();
        return view('dealers.spareparts.spareparts_list',compact('records'));
    }

    public function sparePartsView(SpareParts $spare){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('dealers.spareparts.spareparts_view',compact('spare','dealers'));
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
            'img' => ['mimes:jpeg,jpg,png,gif'],
            'dealer_id'=>['required']
            
        ]);
        $message = '';
        
        if($request->img){
            $imageName = time().'.'.$request->img->extension();  
     
            $request->img->move(public_path('images'), $imageName);
        }
        else{
            if($request->id){
                $spare = SpareParts::find($request->id);
                $imageName = $spare->img;
                $message = 'Spare Part updated successfully';
            }
            else{
                $imageName = null;
                $message = 'New Spare Part created successfully';
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
                'img'=>$imageName,
                'dealer_id'=>$request->dealer_id
            ]
        );
        if($spare){
            return redirect()->route('dealers.spare.parts.list')->with('success',$message);

        }
        else{
            return redirect()->route('dealers.spare.parts.list')->with('error','Something went wrong');
        }
    }

    public function sparePartsDelete(SpareParts $spare){
        $spare->delete();
        return redirect()->route('dealers.spare.parts.list')->with('success','Spare Part deleted successfully');
    }
}