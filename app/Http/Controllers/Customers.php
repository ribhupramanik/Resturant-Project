<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Customers extends Controller
{
    public function view_customers():View{
        $all_data = DB::table('clients')->get();
        return view('admin.customers')->with(['allInfo'=>$all_data]);
    }
    public function delete_user($del){
        $delId = $del;
        $user = DB::table('clients')->where("id","=",$delId)->delete();
        return redirect('/admin_customers');
    }
}
