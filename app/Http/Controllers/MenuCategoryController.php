<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuCategoryController extends Controller
{
    public function get_all_onadmin()
    {
        $menu_categories = MenuCategory::all();
        $product_categories = ProductCategory::all();
    
        return view('adminpage.page.category', compact('menu_categories', 'product_categories'));
    }
    
    public function add_menu_category(Request $request){
        $rules = [
            'name' => 'required|max:50',
            'product_category' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('erroradd', 'Failed to add category number !');
        }

        $menu_category = new MenuCategory();
        $menu_category->name = $request->name;
        $menu_category->product_category_id = $request->product_category;

        // dd($menu_category);

        $menu_category->save();

        return  back()->with('successadd', 'Success to add category number !');;
    }

    public function edit_menu_category(Request $request, $id){
        $rules = [
            'name' => 'required|max:50',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('erroredit', 'Failed to edit category number !');
        }

        $menu_category = MenuCategory::find($id);
        $menu_category->name = $request->name != null ? $request->name : $menu_category->name;

        $menu_category->save();
        // dd($menu_category);
        
        return redirect('/category')->with('successedit', 'Category has been updated');
    }

    public function delete_menu_category($id)
    {
        $menu_category = MenuCategory::find($id);

        $menu_category->delete();
        return back()->with('successdelete','Category has been deleted!');
    }

    public function edit_category_page($id)
    {
        $menu_category = MenuCategory::find($id);
        // dd($menu_category);
        $product_category = ProductCategory::all();

        return view('adminpage.page.editcategory', compact('menu_category','product_category'));
    }
}
