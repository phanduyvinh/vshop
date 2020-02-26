<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $guarded = ['id'];
    protected $timestamp = true;
    // khai bao moi quan he
    public function brand(){
    	return $this->belongsTo('App\Models\Brand');
    }
    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }

    // public function order(){
    //     return $this->belongsToMany('App\Models\Order','order_details','product_id','order_id');
    // }
}
