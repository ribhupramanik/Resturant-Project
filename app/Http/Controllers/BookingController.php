<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function home(){
        $all_data = DB::table('tables')->where('Status','=','Unreserved')->get();
        return view('restu.booking')->with(['allInfo'=>$all_data]);
    }

    public function add_booking(Request $request){
        $name = $request->input('name');
        $email = $request->input("email");
        $time = $request->input("time");
        $people = $request->input("people");
        $message = $request->input("message");
        $table_number = $request->input("table_number");
        $data = [
            'name'      => $name,
            'email'     => $email,
            'time'      => $time,
            'people'    => $people,
            'message'   => $message,
            'table_number' =>$table_number
        ];
        $data_table = ['Status'=>"Reserved"];
        DB::table('bookings')->insert($data);
        DB::table('tables')->where("TableNumber","=",$table_number)->update($data_table);
        return response()->json(['success' => true]);
        return redirect('/booking');
    }
}
