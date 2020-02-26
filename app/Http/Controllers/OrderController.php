<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('cus_id')==1){
            $order = Order::all();
            return view('frontend.admin.order.index',compact('order'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if(Session::get('cus_id')==1){
            $customer = Customer::pluck('first_name','id')->toArray();
            $product = Product::pluck('product_name','id')->toArray();
            return view('frontend.admin.order.create',compact('customer','product'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::get('cus_id')==1){
            $order = Order::findOrfail($id);
            if($order){
                $orderdetail = OrderDetail::where('order_id',$order->id)->get();
                return view('frontend.admin.order.detail',compact('order','orderdetail'));
            }
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get('cus_id')==1){
            $order = Order::findOrfail($id);
            $customer = Customer::pluck('first_name','id')->toArray();
            $product = Product::pluck('product_name','id')->toArray();
            return view('frontend.admin.order.edit',compact('customer','order','product'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Session::get('cus_id')==1){   
            $order = Order::findOrfail($id);
            $validatedData = $request->validate([
                'status' => 'required|min:6',
            ]);
            $order->status = $request->status;
            $order->update();
            return back()->with('success','Data saved successfully!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::get('cus_id')==1){
            $order = Order::findOrfail($id);
            if ($order) {
                $order->delete();
            } 
            return redirect()->action('OrderController@index')->with('success','Delete successfully!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }
}
