<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $timestamp = true;
    // khai bao moi quan he
    public function order(){
    	return $this->hasMany('App\Models\Order');
    }
}
