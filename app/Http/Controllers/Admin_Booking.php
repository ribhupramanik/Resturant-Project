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
}
