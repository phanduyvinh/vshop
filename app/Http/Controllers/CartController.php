<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Cart::content();
        return view('frontend.home.cart',compact('cart'));
    }

    public function delete($id)
    {
        Cart::remove($id);
        return back()->with('message','Deleted!');
    }
    public function deleteall()
    {
        Cart::destroy();
        return back()->with('message','Deleted!');
    }
    public function setquantity(Request $request)
    {
        $id = $request->rowId;
        $quantity = $request->quantity;
        Cart::update($id, $quantity);
        return back()->with('message','Update successful!');
    }

    public function addCart($id, Request $request)
    {
        $product = Product::findorFail($id);
        if($request->quantity){
            $quantity = $request->quantity;
        }else{
            $quantity = 1;
        }
        $cart = ['id' => $id, 'name' => $product->product_name,'qty' => $quantity, 'price' => $product->price, 'options' => ['img' => $product->image,'product_code' => $product->product_code]];
        Cart::add($cart);
        // dd(Cart::content());
        return redirect('cart')->with('message','The shopping cart has been successfully added!');
    }

    public function checkout(Request $request)
    {
        if(Session::has('cus_id')){
            $order_number = rand(1000,9999).Carbon::now('Asia/Ho_Chi_Minh')->year.Carbon::now('Asia/Ho_Chi_Minh')->month.Carbon::now('Asia/Ho_Chi_Minh')->day;
            $order = Order::insertGetId([
                       'order_number' => $order_number,
                        'transaction_date' => Carbon::now('Asia/Ho_Chi_Minh'),
                        'customer_id' => Session::get('cus_id'),
                        'total_amount' => Cart::total(),
                        'status' => 'Wait for confirmation'
            ]);
            foreach (Cart::content() as $cart) {
                $orderdetail = new OrderDetail([
                           'order_id' => $order,
                            'product_id' => $cart->id,
                            'quantity' => $cart->qty,
                            'price' => $cart->price,
                            'sub_total' => $cart->price*$cart->qty
                ]);
                $orderdetail->save();
            }
            Cart::destroy();
            return back()->with('message','Data saved successfully!');
        }
        return redirect('login')->with('error','You need to login to complete the checkout process!');
        
    }
}
