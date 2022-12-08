<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','smart_id','price','order_status','dealer_id','item_type'];

    
    public function smart(){
        return $this->belongsTo(Smart::class,'smart_id','id');
    }
    public function dealer(){
        return $this->belongsTo(User::class,'dealer_id','id');
    }
}
