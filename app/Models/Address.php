<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
