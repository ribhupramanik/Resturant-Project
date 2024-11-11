<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class Order extends Controller
{
    public function cart():View{
        $cartContent = Cart::content();
        $data['cartContent'] = $cartContent;
        $all_data = DB::table('tables')->where('Status','=','Unreserved')->get();
        return view('restu.orders',$data)->with(['allInfo'=>$all_data]);
    }

    public function addToCart(Request $request){
        $id = $request->id;
        $product = DB::table('food_items')->where('id','=',$id)->first();
        if($product== null){
            return response()->json([
                'status'=> false,
                'message' => 'Record not found'
            ]);
        }

        if(Cart::count()>0){
            //echo "If Part";
            $cartContent = Cart::content();
            $productAlreadyExist = false;
            foreach($cartContent as $item){
                if($item->id == $product->id){
                    $productAlreadyExist = true;
                }
            }
            if($productAlreadyExist==false){
                Cart::add($product->id,$product->FoodName,1,$product->Price,['productImage'=>$product->image]);
                $status = true;
                $message = $product->FoodName.' Added in Cart';
            }
            else{
                $status = false;
                $message = $product->FoodName.' already added in Cart';
            }
        }else{
            echo "Else Part";
            Cart::add($product->id,$product->FoodName,1,$product->Price,['productImage'=>$product->image]);
            $status = true;
            $message = $product->FoodName.' Added in Cart';
        }

        return response()->json([
            'status' =>$status,
            'message' => $message
        ]);
    }


    public function updateCart(Request $request){
        $rowId=$request->rowId;
        $qty=$request->qty;
        $itemInfo = Cart::get($rowId);

        $product = DB::table('food_items')->where('id','=',$itemInfo->id)->first();

        if($product->Quantity>=$qty){
            Cart::update($rowId,$qty);
            $message = 'Cart Updated';
            $status = true;
            session()->flash('success',$message);
        }else{
            $message = "Requested Quantity('.$qty') not available in stock";
            $status = false;
            session()->flash( 'error',$message);
        }
        
        
        session()->flash('success',$message);
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function deleteItem(Request $request){
        
        $rowId = $request->input('rowId');
        // Logic to remove the item from the cart
        if (Cart::remove($rowId)) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
        
    }
}
