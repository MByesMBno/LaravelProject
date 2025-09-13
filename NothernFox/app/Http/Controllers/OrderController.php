<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

    public function show(string $id)
    {
        $total=DB::table('orders')->selectRaw('sum(order_items.price * order_items.quantity) as total')
        ->join('order_items', 'orders.id','=','order_items.order_id')
        ->join('items','items.id','=','order_items.item_id')
        ->where('orders.id',$id)
        ->first();
        return view("order", ["order"=>Order::all()->where('id', $id)
        ->first(),
        'total'=>$total
    ]);
    }

}
