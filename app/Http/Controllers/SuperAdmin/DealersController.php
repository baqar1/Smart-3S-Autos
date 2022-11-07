<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class DealersController extends Controller
{
    public function dealerList(){
        $dealers = User::where('type','dealer')->get();
        return view('superadmin.dealers.dealer_list')->with('dealers',$dealers);
    }
    public function dealerStatus(Request $request){
        $message = '';
        if($request->dealer_id){
            $dealer = User::find($request->dealer_id);
            if($request->value=='true'){
                $dealer->update(['status'=>'1']);
                $message = 'Dealer activated successfully';
                $info = false;
            }
            else{
                $dealer->update(['status'=>'0']);
                $message = 'Dealer deactivated successfully';
                $info = true;
    
            }
            return response()->json(['result'=>true,'message'=>$message,'info'=>$info]);
        }
        else{
            return response()->json(['result'=>true]);

        }
    }

    public function dealerEdit(User $dealer){
        return view('superadmin.dealers.dealer_edit',compact('dealer'));
    }
    public function dealerUpdate(Request $request,User $dealer){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ($request->password!=null)? [Rules\Password::defaults()] :''
        ]);
        $user = $dealer->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password!=null)?Hash::make($request->password):$dealer->password,
            'type'=>$request->type,
        ]);
        if($user){
            return redirect()->route('dealers_list')->with('success','Dealer updated successfully');
        }
        else{
            return redirect()->route('dealers_list')->with('error','Something went wrong');
        }
    }
}
