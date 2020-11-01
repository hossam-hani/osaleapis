<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(shop::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
