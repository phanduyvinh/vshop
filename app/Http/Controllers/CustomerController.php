<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('cus_id')==1){
            $customer = Customer::all();
        // dd($post);
            return view('frontend.admin.customer.index',compact('customer'));
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
            return view('frontend.admin.customer.create');
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
        if(Session::get('cus_id')==1){
            $customer = new Customer([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'password' => $request->password,
                'email' => $request->email,
                'postal_address' => $request->postal_address,
                'physical_address' => $request->physical_address
            ]);
            $customer->save();
            return back()->with('success','Data saved successfully!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
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
            $customer = Customer::findOrfail($id);
            $order = Order::where('customer_id',$id)->count();
            return view('frontend.admin.customer.detail',compact('customer','order'));
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
            $customer = Customer::findOrfail($id);
            return view('frontend.admin.customer.edit',compact('customer'));
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
    public function update(AccountRequest $request, $id)
    {
        if(Session::get('cus_id')==1){
            $customer = Customer::findOrfail($id);
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->postal_address = $request->postal_address;
            $customer->physical_address = $request->physical_address;
        // $customer->password = md5($request->password);
            $customer->update();

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
            $customer = Customer::findOrfail($id);
            $order = Order::where('customer_id',$id)->first();
            if ($customer && $customer->id!=1 && $order==null) {
                $customer->delete();
                return back()->with('success','Delete successfully!');
            }
            return back()->with('error','Something wrong!You cannot delete it');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');

    }
}
