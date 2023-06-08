<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuCategoryController extends Controller
{
    public function get_all_onadmin(){
        $menu_categories = MenuCategory::all();
        // dd($menu_categories);

        return view('adminpage.page.category', compact('menu_categories'));
    }

    public function add_menu_category(Request $request){
        $rules = [
            'name' => 'required|max:50',
            'product_category' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $menu_category = new MenuCategory();
        $menu_category->name = $request->name;
        $menu_category->product_category_id = $request->product_category;

        $menu_category->save();

        return back()->with('message', 'Add Category Success!');
    }

    public function edit_menu_category(Request $request){
        $menu_category = MenuCategory::find($request->id);
        $menu_category->name = $request->name != null ? $request->name : $menu_category->name;
        $menu_category->product_category_id = $request->product_category!=null ? $request->product_category : $menu_category->product_category_id;

        $menu_category->save();
        
        return back()->with('message','Edit Category Success!');
    }

    public function delete_menu_category($id)
    {
        $menu_category = MenuCategory::find($id);

        $menu_category->delete();
        return back()->with('message','Course has been deleted!');
    }
}
