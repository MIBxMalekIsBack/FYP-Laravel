<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\OrderDetail;
use App\Order;
use Auth;

class CustomerController extends Controller
{
    public function home()
	{
		return view('/home');
	}

	public function customerMenu()
    {
        $items = Item::get();
        return view('customer/customerMenu', ['items' => $items]);
    }

    public function customerAboutUs()
    {
        return view('customer/customerAbout');
    }

    public function customerHome()
    {
        return view('customer/home');
    }

    public function viewCustomerOrder()
    {
        $user = Auth::user();        
        $custOrders = OrderDetail::whereHas('order', function($query) use ($user){
            $query->where('user_id',$user->id);
            })->orderBy('created_at','desc')->get();
        return view('customer/customerOrder', ['custOrders' => $custOrders]);
    }

    public function viewReceipt($id)
    {
        $order = Order::find($id);

        return view('customer/receipt',['order' => $order]);
    }
}
