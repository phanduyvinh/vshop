<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_details';
    protected $guarded = ['id'];
    protected $timestamp = true;

   public function product(){
    	return $this->belongsTo('App\Models\Product','product_id');
    }

    public function order(){
    	return $this->belongsTo('App\Models\Order','order_id');
    }
}
