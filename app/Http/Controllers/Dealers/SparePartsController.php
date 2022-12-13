<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpareStoreRequest;
use App\Models\Smart;
use App\Models\SmartImage;
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
        $imageCount = SmartImage::where('image_id',$spare->id)->count();
        return view('dealers.spareparts.spareparts_view',compact('spare','dealers','imageCount'));
    }

    public function sparePartsStore(SpareStoreRequest $request,Smart $smart){

        $validated = $request->validated();

        $spare = $smart->saveSpareParts($validated);

        $message = '';
        
        
            if($request->id){
                $imageCount = SmartImage::where('image_id',$request->id)->count();
                if($imageCount <= 0){
                    $spare->update(['status'=>0]);
                    return redirect()->back()->with('error','You must upload image to publish this spareparts');
                }
                $spare->update(['status'=>1]);
                $message = 'Spare Part updated successfully'; 
            }
            else{
                $message = 'New Spare Part created successfully, but must upload images to publish';
                return redirect(route('dealers.spare.parts.view',[$spare->id]))->with('success',$message);
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
        SmartImage::where('image_id',$spare->id)->delete();
        return redirect()->route('dealers.spare.parts.list')->with('success','Spare Part deleted successfully');
    }
}
