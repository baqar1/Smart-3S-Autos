<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use App\Models\Order;
use App\Models\Service;
use App\Models\SpareParts;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ordersList(Request $request){
        $orders = Order::with('smart','dealer')->get();
        return view('orders_list')->with('orders',$orders);
    }

    public function ordersFilter(Request $request){
        $orders = Order::with('smart','dealer');
        if($request->value!=''){
            
            $orders = $orders->where('order_status',$request->value);
        }
        $orders = $orders->get();
        $html = view('layouts.partial',['orders'=>$orders])->render();
        return response()->json([
            'status'=>true,
            'message'=>'filter changed successfully',
            'orders'=>$html
        ]);

    }

    public function getAllOrders(){
        $orders = Order::with('smart')->get();
        return response()->json([
            'status'=>true,
            //'message'=>'order already exist',
            'order'=>$orders
        ]);
    }

    public function createOrder(Request $request){
        $validate = $request->validate([
            'user_id'=>'required',
            'smart_id'=>'required',
            'dealer_id'=>'required',
            'item_type'=>'required',
            'price'=>'required',
            'order_status'=>'required'
        ]);
        if($request->order_status==1){
            $orderExist = Order::where('user_id', $request->user_id)
                            ->where('smart_id', $request->smart_id)
                            ->where('dealer_id',$request->dealer_id)
                            ->where('item_type',$request->item_type)
                            ->where('order_status', 1)
                            ->first();
            if($orderExist){
                return response()->json([
                    'status'=>true,
                    'message'=>'order already exist',
                    'order'=>$orderExist
                ]);
            }
            $order = Order::create($validate);
            return response()->json([
                'status'=>true,
                'message'=>'success',
                'order'=>$order
            ]);
        }
        else{
            return response()->json([
                'status'=>true,
                'message'=>'wrong Input',
            ]);

        }
        
    }

    public function cancelOrder(Request $request){
        $request->validate([
            'order_id'=>'required',
        ]);
        $orderExist = Order::find($request->order_id);
        if ($orderExist){
            $order = $orderExist->delete();
            return response()->json([
                'status'=>true,
                'message'=>'order cancel successfully',
                'order'=>$order
            ]);
        }
        else {
            return response()->json([
                'status'=>true,
                'message'=>'no order found',
            ]);
        }
    }

    public function approveOrder(Request $request){
        $request->validate([
            'order_id'=>'required',
        ]);
        $orderExist = Order::find($request->order_id);
        if($orderExist){
            $order = $orderExist->update([
                'order_status'=>3// assign 3 means order is going for approval to super admin
            ]);
        }
        else{
            return response()->json([
                'status'=>true,
                'message'=>'no order found',
            ]);
        }
    }

    public function orderStatus(Request $request){
        $order = Order::find($request->order_id);
        if($order){
            $updateStatus = $order->update([
                'order_status'=>$request->value
            ]);
            if($updateStatus){
                //complete order and assign commision to dealer and super admin
                if($request->value == 2){
                    $adminCommision = null;
                    $remainingPrice = null;
                    $dealer = null;
                    $adminSetting = AdminSetting::first();
                    //service commision
                    if($order->item_type==1){
                        $adminCommision = ($order->price * $adminSetting->service_commision)/100;
                        $remainingPrice = $order->price - ($order->price * $adminSetting->service_commision)/100;
                    }
                    //spareparts commision
                    else if($order->item_type==2){
                        $adminCommision = ($order->price * $adminSetting->spareparts_commision)/100;
                        $remainingPrice = $order->price - ($order->price * $adminSetting->spareparts_commision)/100;
                    }
                    //vehicles commision
                    else if($order->item_type==3){
                        
                        $adminCommision = ($order->price * $adminSetting->vehicles_commision)/100;
                        $remainingPrice = $order->price - ($order->price * $adminSetting->vehicles_commision)/100;
                    }
                    //update dealer wallet
                    $dealer = User::find($order->dealer_id);
                    
                    $dealer->update(['wallet'=>$dealer->wallet +=$remainingPrice]);
                    //update admin wallet
                    $superAdmin = User::where('type','super-admin')->first();
                    $superAdmin->update(['wallet'=>$superAdmin->wallet +=$adminCommision]);

                    return response()->json([
                        'status'=>true,
                        'message'=>'order Completed Successfully',
                        'flag'=>'2'
                    ]);

                }
                else{
                    return response()->json([
                        'status'=>true,
                        'message'=>'order updated Successfully',
                        'flag'=>'1'
                    ]); 
                }

            }
            else{
                return response()->json([
                    'status'=>true,
                    'message'=>'Something went wrong',
                ]); 
            }

        }
        else{
            return response()->json([
                'status'=>true,
                'message'=>'No order Found',
            ]); 
        }
    }
}
