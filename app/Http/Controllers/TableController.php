<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    public function show_tables_onadmin(){
        $tables = Table::all();

        return view('adminpage.page.table', compact('tables'));
    }
    
    public function add_table(Request $request){
        $rules = [
            'no_table' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $table = new Table();
        $table->no_table = $request->no_table;
        $table->save();

        return back()->with('message', 'Add Table Success!');
    }

    public function delete_table($id){
        $table = Table::find($id);
        $table->delete();

        return back()->with('message','Course has been deleted!');
    }
}
