<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Invoice extends Controller
{
    public function home($ep){
        $invoice_no = $order_no;
        dd('$invoice_no');
        // return view('bill.invoice');
    }
}
