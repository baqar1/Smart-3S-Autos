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
        if($request->dealer_id){
            $dealer = User::find($request->dealer_id);
            if($request->value=='true'){
                $dealer->update(['status'=>'1']);
                $message = 'Dealer activated successfully';
                return response()->json(['result'=>'1','success'=>$message]);
            }
            else{
                $dealer->update(['status'=>'0']);
                $message = 'Dealer deactivated successfully';
                return response()->json(['result'=>'0','info'=>$message]);    
            }
        }
        else{
            return response()->json(['result'=>false]);

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
            'status'=>($request->status!=null)?$request->status:0,
        ]);
        if($user){
            return redirect()->route('dealer.list')->with('success','Dealer updated successfully');
        }
        else{
            return redirect()->route('dealer.list')->with('error','Something went wrong');
        }
    }

    public function dealerAdd(){
        return view('superadmin.dealers.dealer_add');
    }
    public function dealerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=>$request->type,
            'status'=>($request->status!=null)?$request->status:0,
        ]);

        return redirect()->route('dealer.list')->with('success','New dealer created successfully');
    }
}
