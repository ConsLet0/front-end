<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    // public function show_category(){
    //     $category = ProductCategory::all();

    //     return view('userpage.partials.navbar', compact('category'));
    // }

    public function add_product_category(Request $request){
        $rules = [
            'name' => 'required|max:50'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $product_category = new ProductCategory();
        $product_category->name = $request->name;

        $product_category->save();

        return["Product Category Added!"];
    }
}
