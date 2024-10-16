<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Catagories extends Controller
{
    public function home():View{
        $all_data = DB::table('catagories')->get();
        return view('admin.catagories')->with(['allInfo'=>$all_data]);
    }
    public function add_catagory_page(){
        return view('admin.add_catagories');
    }
    public function add_catagory_form(Request $request){
        $name = $request->input('catagory_name');
        $data =['CatagoryName'=>$name];
        DB::table('catagories')->insert($data);
        return redirect('/catagories');
    }

    public function edit_catagory_page($ep):View
    {
        $epId = $ep;
        $user = DB::table('catagories')->where("id","=",$epId)->get();
        return view('admin.edit_catagory')->with(['editInfo'=>$user[0]]);
    }

    public function edit_catagory_program(Request $request){
        $id = $request->input('hid');
        $name = $request->input('catagory_name');
        $data = ['CatagoryName'=>$name];
        DB::table('catagories')->where("id","=",$id)->update($data);
        return redirect('/catagories');
    }

    public function delete_catagory($del){
        $delId = $del;
        $user = DB::table('catagories')->where("id","=",$delId)->delete();
        return redirect('/catagories');
    }
}
