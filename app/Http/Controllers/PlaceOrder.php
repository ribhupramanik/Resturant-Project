<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Razorpay\Api\Api;

class PlaceOrder extends Controller
{
    public function place_order_program(Request $request){
        $order_no = rand(1000,99999);
        $id = $request-> input('id');
        $name = implode('.',$request->input('name'));
        $quantity = implode('.',$request->input('quantity'));
        $total_price = $request->input('total_price');
        $table_number = $request->input('table_number');
        $data =[
            'name'=>$name,
            'quantity'=>$quantity,
            'total_price'=>$total_price,
            'order_no'=>$order_no,
            'table_number'=>$table_number
        ];
        $data_table=['Status'=>"Reserved"];
        DB::table('orders')->insert($data);
        DB::table('tables')->where("TableNumber","=",$table_number)->update($data_table);
        Cart::destroy();
        return response()->json(['success' => true]);
    }
    

public function verifyPayment(Request $request) {
    $paymentId = $request->input('razorpay_payment_id');

    try {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($paymentId);

        if ($payment->status == 'captured') {
            // Place the order and return success
            return response()->json(['success' => true]);
        } 
        // else {
        //     return response()->json(['success' => false, 'error' => 'Payment failed.']);
        // }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}

}
