<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function order_details() {
        return $this->hasMany('App\OrderDetail');
    }


    public function items() {
        return $this->hasMany('App\Item');
    }
}
