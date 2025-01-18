<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FoodItems extends Controller
{
    public function home():View{
        $all_data = DB::table('food_items')->get();
        return view('admin.food_items')->with(['allInfo'=>$all_data]);
    }

    public function add_fooditems_page(){
        $all_data = DB::table('catagories')->get();
        return view('admin.add_fooditems')->with(['allInfo'=>$all_data]);
    }

    public function add_fooditems_program(Request $request)
    {
        $c_name = $request->input('catagory_name');
        $c_id= $request->input('catagory_id');
        $f_name = $request->input('food_name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $description = $request->input('food_description');
        if($request->file('image'))
        $file= $request->file('image');
        $fileName = time()."_".$file->getClientOriginalName();
        $uploadLocation = "./public/uploads";
        $file->move($uploadLocation,$fileName);
        $data=[
            'CatagoryName'      =>  $c_name,
            'CatagoryId'        =>  $c_id,
            'FoodName'          =>  $f_name,
            'Price'             =>  $price,
            'Quantity'          =>  $quantity,
            'Description'       =>  $description,
            'image'             =>  $uploadLocation."/".$fileName
        ];
        DB::table('food_items')->insert($data);
        return redirect('/fooditems');
    }

    public function edit_fooditems_page($ep):View{
        $epId= $ep;
        $user = DB::table('food_items')->where("id","=",$epId)->get();
        return view('admin.edit_fooditems')->with(['editInfo'=>$user[0]]);
    }

    public function edit_fooditems_program(Request $request)
    {
        $id = $request->input('hid');
        $c_name = $request->input('catagory_name');
        $f_name = $request->input('food_name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $description = $request->input('food_description');
        if($request->file('image'))
        $file= $request->file('image');
        $fileName = time()."_".$file->getClientOriginalName();
        $uploadLocation = "./public/uploads";
        $file->move($uploadLocation,$fileName);
        $data=[
            'CatagoryName'      =>  $c_name,
            'FoodName'          =>  $f_name,
            'Price'             =>  $price,
            'Quantity'          =>  $quantity,
            'Description'       =>  $description,
            'image'             =>  $uploadLocation."/".$fileName
        ];
        DB::table('food_items')->where("id","=",$id)->update($data);
        return redirect('/fooditems');
    }

    public function delete_fooditems($del){
        $delId = $del;
        $user = DB::table('food_items')->where("id","=",$delId)->delete();
        return redirect('/fooditems');
    }
}
