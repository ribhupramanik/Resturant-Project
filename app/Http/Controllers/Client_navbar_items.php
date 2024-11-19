<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client_navbar_items extends Controller
{
    public function contact_view(){
        return view('restu.contact');
    }
}
