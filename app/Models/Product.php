<?php

namespace App\Models;

use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\MenuCategory;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'menu_category_id', 'product_category_id', 'image'
    ];

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

    public function order_detail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
