<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $timestamp = true;
    // khai bao moi quan he
    public function customer(){
    	return $this->belongsTo('App\Models\Customer');
    }
    // public function order_detail(){
    // 	return $this->belongsToMany('App\Models\Product','order_details','order_id','product_id');
    // }

    // public function product(){
    // 	return $this->belongsToMany('App\Models\Product','order_details','order_id','product_id');
    // }
}
