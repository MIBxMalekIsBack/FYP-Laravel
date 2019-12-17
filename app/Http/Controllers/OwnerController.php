<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Order;
use App\OrderDetail;
use Auth;
use DB;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        return view('owner/home');
    }

    public function listCustomer()
    {
    	$customers = User::paginate(10);
    	return view ('owner.listCustomer', ['customers' => $customers]);
    }

    public function viewOrder(Request $request)
    {
        $query = OrderDetail::with('item', 'order'); /*select table*/

        if (!empty($request->id)) { /*get input from search */
            $query->whereHas('order', function ($query) use ($request) {    /*where has table order and perform function*/
                $query->where('id', $request->id);  /*find the requested id*/
            });
        }

        $order_details = $query->orderBy('created_at','desc')->paginate(10);

        return view ('owner/viewOrder', ['order_details' => $order_details]);
    }

    public function updateStatus()  //untuk tngok list order, buat seperate.
    {

        $order_details = OrderDetail::with('item', 'order')->paginate(10);

        return view ('owner/viewOrder', ['order_details' => $order_details]);  //buat prompt success and reject
  
    }
    public function updateStatus2(Request $request, $id)
    {
        $order = Order::find($id);
        $order -> status = $request->status;
        $order->save();
        return redirect()->back();
  
    }

    public function viewAddMenu()
    {
        $items = Item::get();
        return view('owner/addMenu', ['items' => $items]);
    }
    
    public function addMenu(Request $request)
    {
        $item = new Item;
        $item->flavour = $request->flavour;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName(); //getting image name
            $filename = $extension;
            $file->move('img', $filename);
            $item->image = $filename;  //store in db
        }else{
            return $request;
            $item->image = '';
        }
        $item->save();

        return redirect('owner/addMenu')->with('success', 'Successfully Register New Flavour');
    }

    public function editMenuForm($id)
    {
        $items = Item::find($id);
        return view ('owner/editMenuForm',['items' => $items]);
        
    }

    public function updateMenu(Request $request)
    {
        $items = Item::find($request->input('itemID'));

        $items -> flavour = $request->input('flavour');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalName(); //getting image name
            $filename = $extension;
            $file->move('img', $filename);
            $items->image = $filename;  //store in db
        }else{
            return $request;
            $items->image = '';
        }
        $items->save();

        $items = Item::get();
        return view('owner/addMenu', ['items' => $items]);
    }

    
}
