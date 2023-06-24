<?php

namespace App\Models;

use App\Models\Product;
use App\Models\MenuCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function menu_category(){
        return $this->hasMany(MenuCategory::class);
    }
}
