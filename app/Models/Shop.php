<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
