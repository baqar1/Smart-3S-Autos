<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DahboardController extends Controller
{
    public function index(){
        return view('superadmin.dashboard');
    }
}
