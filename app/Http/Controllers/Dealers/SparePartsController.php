<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpareStoreRequest;
use App\Models\Smart;
use App\Models\SpareParts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparePartsController extends Controller
{
    public function sparePartsList(){
        $records = Smart::where('dealer_id',Auth::user()->id)->where('type',2)->get();
        return view('dealers.spareparts.spareparts_list',compact('records'));
    }

    public function sparePartsView(Smart $spare){
        $dealers = User::where('type','dealer')->where('status','1')->get();
        return view('dealers.spareparts.spareparts_view',compact('spare','dealers'));
    }

    public function sparePartsStore(SpareStoreRequest $request,Smart $smart){

        $validated = $request->validated();

        $spare = $smart->saveSpareParts($validated);

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
        
        if($spare){
            return redirect()->route('dealers.spare.parts.list')->with('success',$message);

        }
        else{
            return redirect()->route('dealers.spare.parts.list')->with('error','Something went wrong');
        }
    }

    public function sparePartsDelete(Smart $spare){
        $spare->delete();
        return redirect()->route('dealers.spare.parts.list')->with('success','Spare Part deleted successfully');
    }
}
