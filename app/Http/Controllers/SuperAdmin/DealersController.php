<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DealersController extends Controller
{
    public function dealerList(){
        $dealers = User::where('type','dealer')->get();
        return view('superadmin.dealers.dealer_list')->with('dealers',$dealers);
    }
}
