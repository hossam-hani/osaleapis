<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Category;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(shop::class);
    }

    public function category()
    {
        return $this->belongsTo(shop::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
