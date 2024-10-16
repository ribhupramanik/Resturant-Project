<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceOrder extends Controller
{
    public function place_order_program(Request $request){
        $order_no = rand(1000,99999);
        $name = implode('.',$request->input('name'));
        $quantity = implode('.',$request->input('quantity'));
        $total_price = $request->input('total_price');
        $table_number = $request->input('table_number');
        $data =[
            'name'=>$name,
            'quantity'=>$quantity,
            'total_price'=>$total_price,
            'order_no'=>$order_no,
            'table_number'=>$table_number
        ];
        $data_table=['Status'=>"Reserved"];
        // dd($data);
        DB::table('orders')->insert($data);
        DB::table('tables')->where("TableNumber","=",$table_number)->update($data_table);
        // $all_data = DB::table('orders')->where("order_no","=",$order_no)->get();
        // return view('bill.invoice')->with(['allInfo'=>$all_data[0]]);
    }
}
