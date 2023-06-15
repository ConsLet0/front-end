<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show_products_onadmin(){
        $products = Product::all();
        $product_categories = ProductCategory::all();
        $menu_categories = MenuCategory::all();

        return view('adminpage.page.products', compact('products', 'product_categories', 'menu_categories'));
    }

    public function edit_product_page($id){
        $products = Product::find($id);
        $product_categories = ProductCategory::all();
        $menu_categories = MenuCategory::all();

        return view('adminpage.page.editproduct', compact('products', 'product_categories', 'menu_categories'));
    }

    public function show_products($id){
        $category = ProductCategory::find($id);
        $products = Product::where('product_category_id', $category->id)->orderBy('created_at', 'desc')->get();

        $menu_category = MenuCategory::where('product_category_id', $category->id)->orderBy('created_at', 'desc')->get();

        return view('userpage.page.showproduct',compact('category', 'products', 'menu_category'));
    }

    public function show_products_by_menucategory($id){
        $menu_category = MenuCategory::find($id);
        $products = Product::where('menu_category_id', $menu_category->id)->orderBy('created_at', 'desc')->get();

        $menu_category = MenuCategory::where('product_category_id', $menu_category->id)->orderBy('created_at', 'desc')->get();

        return view('userpage.page.showproduct', compact('menu_category', 'products'));
    }

    public function product_detail($id){
        $product = Product::find($id);

        // $courseDetail = CourseDetail::where('course_id', $id)->get();
        // $video = DB::table('course_videos')
        // join('course_details', 'course_videos.course_detail_id','=','course_details.id')
        // ->select('course_videos.*')
        // ->where('course_videos.course_detail_id','course_details.id')
        // ->get();

        return view('userpage.page.productdetails', compact('product'));
    }

    public function add_product(Request $request){
        $rules = [
            'product_category' => 'required',
            'menu_category' => 'required',
            'name' => 'required|max:50',
            'description' => 'required|max:120',
            'price' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,png'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('erroradd', 'Failed to add new product !');
        }

        $product = new Product();
        $product->product_category_id = $request->product_category;
        $product->menu_category_id = $request->menu_category;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;

        $file = $request->file('image');

        if($file != null)
        {
            // $file_name = time() . $file->getClientOriginalName();
            // Storage::putFileAs('public/images', $file, $file_name);
            $fileName = uniqid(). '.' . $file->getClientOriginalExtension();
            $path = $file->move('product/',$fileName);
    
            $product->image =  $fileName;
        }

        $fix_price = (int)str_replace('.', '', $request->price);
        $product->price = $fix_price;

        $product->save();
        
        return back()->with('successadd', 'Add Product Success!');
    }

    public function update_product(Request $request){
        $product = Product::find($request->id);
        $product->name = $request->name != null ? $request->name : $product->name;
        $product->description = $request->description != null ? $request->description : $product->description;
        $product->price = $request->price != null ? $request->price : $product->price;
        $product->status = $request->status != null ? $request->status : $product->status;
        $product->product_category_id = $request->product_category_id != null ? $request->product_category_id : $product->product_category_id;
        $product->menu_category_id = $request->menu_category_id != null ? $request->menu_category_id : $product->menu_category_id;
        if(isset($file)){
            $fileName = uniqid(). '.' . $file->getClientOriginalExtension();
            $path = $file->move('product/', $fileName);
            $product->image = $fileName;
        }
        $product->save();
        
        return redirect('/products')->with('successedit', 'Product has been updated');
    }

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();

        return back()->with('successdelete','Product has been deleted!');
    }
}
