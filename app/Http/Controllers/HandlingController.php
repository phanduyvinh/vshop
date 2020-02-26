<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
class HandlingController extends Controller
{
    
    public function index()
    {
        $product = Product::limit(9)->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.home.product',compact('product','category','brand'));
    }

    public function productdetail($id)
    {
        $product = Product::findOrfail($id);
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.home.productdetail',compact('product','category','brand'));
    }

    public function productIncategory($id){
    	$category = Category::all();
        $brand = Brand::all();
        // lay du lieu 
        $product =Category::findOrfail($id)->product()->get();
        return view('frontend.home.product',compact('product','category','brand'));
    }

    public function productInbrand($id){
    	$category = Category::all();
        $brand = Brand::all();
        // lay du lieu 
        $product =Brand::findOrfail($id)->product()->get();
        return view('frontend.home.product',compact('product','category','brand'));
    }

    public function search(Request $request){
    	$keyword = $request->keyword;
    	if($keyword){
          $category = Category::all();
          $brand = Brand::all();
	        // lay du lieu 
          $product =Product::where('product_name', 'LIKE', "%$keyword%")->get();
          return view('frontend.home.productsearch',compact('product','category','brand'));
      }
      return redirect('/');

  }

  public function register(){
    return view('frontend.home.register');
}

public function registerconfirm(CustomerRequest $request){
        //lay du lieu

    $customer = new Customer([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'username' => $request->username,
        'password' => md5($request->password),
        'email' => $request->email,
        'postal_address' => $request->postal_address,
        'physical_address' => $request->physical_address
    ]);
    $customer->save();
    return redirect('login')->with('message','Data saved successfully! Now login to continue ..');
}

public function controlpanel(){
    if(Session::get('cus_id')==1){
        $product = Product::count();
        $brand = Brand::count();
        $category = Category::count();
        $customer = Customer::count();
        $order = Order::count();
        return view('frontend.admin.controlpanel',compact('product','brand','category','customer','order'));
    }
    return redirect('login')->with('error','This page is for administrators! You need to log in to continue');

}

public function login(){
    return view('frontend.home.login');
}

public function confirmlogin(Request $request){
    $account = [
        'username' => $request->username,
        'password' => md5($request->password),
    ];
    $cus = Customer::where($account)->first();
    if($cus){
        Session::put('cus_id',$cus->id );
        Session::put('cus_name', $cus->username);
        if($cus->id==1){
            return redirect('controlpanel');
        }
        return redirect('/');
        
    }
    return back()->with('error','Something wrong!');
}

public function logout(){
    Session::forget('cus_id');
    Session::forget('cus_name');
    return redirect('login');
}

public function account(){
    if(Session::has('cus_id')){
        $order = Order::where('customer_id',Session::get('cus_id'))->get();
        $customer = Customer::findOrfail(Session::get('cus_id'));
        return view('frontend.home.account',compact('order','customer'));
    }
    return redirect('login')->with('error','You need to login to continue!');

}
public function update_account(AccountRequest $request){
    if(Session::has('cus_id')){
        $customer = Customer::findOrfail(Session::get('cus_id'));
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->postal_address = $request->postal_address;
        $customer->physical_address = $request->physical_address;
        $customer->update();

        return back()->with('success','Data saved successfully!');
    }
    return redirect('login')->with('error','You need to login to continue!');
}
public function orderdetail($id){
    if(Session::has('cus_id')){
        $order = Order::findOrfail($id);
        if($order){
            $orderdetail = OrderDetail::where('order_id','like',$order->id)->get();
            return view('frontend.home.orderdetail',compact('order','orderdetail'));
        }
    }
    return redirect('login')->with('error','You need to login to continue!');
    
}
public function changepassword(){
    if(Session::has('cus_id')){
        $customer = Customer::findOrfail(Session::get('cus_id'));
        return view('frontend.home.changepassword');
    }
    return redirect('login')->with('error','You need to login to continue!');
}

public function resetpassword($id){
    if(Session::has('cus_id')==1){
        $customer = Customer::findOrfail($id);
        $new_password = rand(100000,999999);
        $customer->password = md5($new_password);
        $customer->save();
        return back()->with('success','The password has been restored to:'.$new_password);
    }
    return redirect('login')->with('error','You need to login to continue!');
}
public function confirmpassword(Request $request){
    if(Session::has('cus_id')){
        $customer = Customer::findOrfail(Session::get('cus_id'));
        if($customer->password==md5($request->old_password) && $request->password==$request->confirm_password ){
            $customer->password = md5($request->password);
            $customer->save();
            return back()->with('success','The password has been changed');
        }
        return back()->with('error','Something wrong!');
    }
    return redirect('login')->with('error','You need to login to continue!');
}


}
