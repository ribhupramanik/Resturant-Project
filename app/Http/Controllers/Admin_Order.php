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
}
