<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Restu_Menu extends Controller
{
    public function menu_view():View{
        $catagory = DB::table('catagories')->get();
        // $catag = strval($catagory);
        $all = DB::table('food_items')->get();
        return view('restu.menu',compact('all','catagory'));
    }
}
