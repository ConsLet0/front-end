<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuCategory extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function product_category(){
        return $this->belonsTo(ProductCategory::class);
    }
}
