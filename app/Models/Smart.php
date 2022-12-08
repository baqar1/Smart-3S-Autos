<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smart extends Model
{
    use HasFactory;
    protected $table = 'smarts';
    protected $primary = 'id';

    public function order(){
        return $this->hasMany(Order::class,'smart_id','id');
    }
    
}
