<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Tables extends Controller
{
    public function home():View{
        $all_data = DB::table('tables')->get();
        return view('admin.tables')->with(['allInfo'=>$all_data]);
    }

    public function add_tables_page(){
        return view('admin.add_tables');
    }

    public function add_tables_form(Request $request){
        $name = $request->input('table_number');
        $data =['TableNumber'=>$name];
        DB::table('tables')->insert($data);
        return redirect('/tables');
    }

    public function edit_tables_page($ep):View
    {
        $epId = $ep;
        $user = DB::table('tables')->where("Id","=",$epId)->get();
        return view('admin.edit_table')->with(['editInfo'=>$user[0]]);
    }

    public function edit_tables_program(Request $request){
        $id = $request->input('hid');
        $name = $request->input('table_number');
        $status = $request->input('status');
        $data = ['TableNumber'=>$name,'Status'=>$status];
        DB::table('tables')->where("Id","=",$id)->update($data);
        return redirect('/tables');
    }

    public function delete_table($del){
        $delId = $del;
        $user = DB::table('tables')->where("Id","=",$delId)->delete();
        return redirect('/tables');
    }

}
