<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function item() {
        return $this->belongsTo('App\Item');
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }
}


