<?php

namespace App\Models;
use App\Models\Shop;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(shop::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
