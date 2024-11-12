<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_Booking extends Controller
{
    public function home():View{
        $all_data = DB::table('bookings')->get();
        return view('admin.booking')->with(['allInfo'=>$all_data]);
    }

    public function edit_booking_page($ep):View
    {
        $epId = $ep;
        $user = DB::table('bookings')->where("id","=",$epId)->get();
        return view('admin.edit_booking')->with(['editInfo'=>$user[0]]);
    }

    public function edit_booking_program(Request $request){
        $id = $request->input('hid');
        $name = $request->input('name');
        $email = $request->input('email');
        $time = $request->input('time');
        $people = $request->input('people');
        $message = $request->input('message');
        $data=[
            'name'        =>  $name,
            'email'       =>  $email,
            'time'        =>  $time,
            'people'      =>  $people,
            'message'     =>  $message,
        ];
        DB::table('bookings')->where("id","=",$id)->update($data);
        return redirect('/admin_booking');
    }
    public function delete_booking($del){
        $delId = $del;
        $user = DB::table('bookings')->where("id","=",$delId)->delete();
        return redirect('/admin_booking');
    }
}
