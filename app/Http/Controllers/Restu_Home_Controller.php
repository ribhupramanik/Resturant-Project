<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Restu_Home_Controller extends Controller
{
    public function index(){
        return view('restu.index');
    }
}
