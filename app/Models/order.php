<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    // for order products ..
    public function orderp(){
        return $this->hasMany(order_product::class);
    }
    // for customer..
    public function customer(){
        return $this->hasOne(customer::class);
    }
}
