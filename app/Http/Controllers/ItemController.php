<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	public function viewMenu()
    {
        $items = Item::get();
        return view('menu', ['items' => $items]);
    }
}
