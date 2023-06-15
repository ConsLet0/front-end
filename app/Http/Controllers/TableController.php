<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    public function show_tables_onadmin()
    {
        $tables = Table::all();

        return view('adminpage.page.table', compact('tables'));
    }

    public function add_table(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_table' => 'required|numeric|unique:tables,no_table',
        ]);
    
        if ($validator->fails()) {
            return back()->with('erroradd', 'Failed to add table number !');
        }
    
        Table::create([
            'no_table' => $request->no_table,
        ]);
    
        return back()->with('successadd', 'Success add table number !');
    }


    public function edit_table_page($id)
    {
        $table = Table::find($id);
        return view('adminpage.page.edittable', compact('table'));
    }

    public function edit_table(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_table' => 'required|numeric|unique:tables,no_table,'.$id,
        ]);

        if ($validator->fails()) {
            return back()->with('erroradd', 'Failed to edit table number !');
        }

        $table = Table::find($id);
        $table->no_table = $request->no_table;
        $table->save();

        return redirect('/table')->with('editsuccess', 'Success edit table number !');
    }


    public function delete_table($id)
    {
        $table = Table::find($id);
        $table->delete();

        return back()->with('deletesuccess', 'Table has been deleted!');
    }
}
