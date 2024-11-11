<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Admin_Order extends Controller
{
    public function home():View{
        $all_data = DB::table('orders')->get();
        return view('admin.orders')->with(['allInfo'=>$all_data]);
    }

    // public function delete_order($del){
    //     $delId = $del;
    //     $status_ch="Unreserved";
    //     $table_no = DB::table('orders')->where("id","=",$delId)->get('table_number');
    //     $data = [
    //         'Status' => $status_ch,
    //     ];
    //     $user = DB::table('orders')->where("id","=",$delId)->delete();
    //     DB::table('tables')->where("TableNumber","=",$table_no)->update($data);
    //     return redirect ('/fooditems');
    // }

    public function delete_order($del) {
        $delId = $del;
        $status_ch = "Unreserved";
        
        // Use first() to get a single record
        $table_no_record = DB::table('orders')->where("id", "=", $delId)->first();
        
        // Check if the record was found
        if ($table_no_record) {
            $table_no = $table_no_record->table_number; // Access the property directly
            
            $data = [
                'Status' => $status_ch,
            ];
            
            // Delete the order
            $user = DB::table('orders')->where("id", "=", $delId)->delete();
            
            // Update the table status
            DB::table('tables')->where("TableNumber", "=", $table_no)->update($data);
        }
    
        return redirect('/orders');
    }
    
}
