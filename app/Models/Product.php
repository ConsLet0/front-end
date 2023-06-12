<?php

namespace App\Models;

use App\Models\Product;
use App\Models\MenuCategory;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public static function get_product($product_id){
        $data = Product::where('id', $product_id)->first();
        
        return $data;
    }

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }

    public function menu_category(){
        return $this->belongsTo(MenuCategory::class);
    }
}
