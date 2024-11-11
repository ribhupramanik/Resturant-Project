<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function home(){
        return view('restu.booking');
    }

    public function add_booking(Request $request){
        $name = $request->input('name');
        $email = $request->input("email");
        $time = $request->input("time");
        $people = $request->input("time");
        $message = $request->input("message");
        $data = [
            'name'      => $name,
            'email'     => $email,
            'time'      => $time,
            'people'    => $people,
            'message'   => $message
        ];
        DB::table('bookings')->insert($data);
        return response()->json(['success' => true]);
        return redirect('/booking');
    }
}
