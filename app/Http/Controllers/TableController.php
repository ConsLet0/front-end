<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
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

        return ["Add Table Success!"];
    }
}
