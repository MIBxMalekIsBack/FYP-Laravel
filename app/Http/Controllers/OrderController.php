<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Item;
use Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
    	$order = new Order;
    	$order->user_id = Auth::user()->id;
    	$order->date = $request->date;
    	$order->time = $request->time;
    	$order->address = $request->address;
        $order->status = $request->status;
    	$order->save();

        foreach ($request->quantity as $item_id => $quantity) {
            $item_ids = Item::whereIn('id', $request->flavour)->pluck('id')->toArray();

            if (in_array($item_id, $item_ids)) {    
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->item_id = $item_id;
                $order_detail->quantity = $quantity;
                $order_detail->price = $quantity;
                $order_detail->save();
            }
        }

        $user = Auth::user();        
        $custOrders = OrderDetail::whereHas('order', function($query) use ($user){
            $query->where('user_id',$user->id);
            })->orderBy('created_at','desc')->get();
        return view('customer/customerOrder', ['custOrders' => $custOrders]);
    }

    public function view()
    {
        $items = Item::get();
    	return view('customer/order', ['items' => $items]);
    }
}
