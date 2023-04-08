<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Property;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
    public function payment(Request $request)
    {

       $user = auth()->user();
       $totla_price=0;

       foreach ($request->items as $item){
           $product = Property::query()->find($item['product_id']);
           if($product->discount == 0){
               $totla_price +=   $product->price * $item['count'];
           }else{
                  // (1000 - (( 1000 * 20)/100)) * 5
               $totla_price += ( $product->price - (($product->price * $product->discount)/100) * $item['count'] );
           }

       }

        $order = Order::query()->create([
            'total_price'=>$totla_price,
            'status'=>PaymentStatus::Draft->value,
            'address_id'=> $request->address_id,
            'user_id'=>$user->id,
            'code'=>rand(1111,9999)
        ]);


        foreach ($request->items as $item){

            $product = Property::query()->find($item['product_id']);
            if($product->discount == 0){
                $totla_price =   $product->price * $item['count'];
            }else{
                // (1000 - (( 1000 * 20)/100)) * 5
                $totla_price = ( $product->price - (($product->price * $product->discount)/100) * $item['count'] );
            }

            $orderDetail = OrderDetail::query()->create([
                'order_id'=>$order->id,
                'product_id'=>$item['product_id'],
                'count'=>$item['count'],
                'price'=>$product->price,
                'discount'=>$product->discount,
                'discount_price'=>$totla_price
            ]);

        }


    }
}
