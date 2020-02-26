<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('cus_id')==1){
            $brand = Brand::all();
            return view('frontend.admin.brand.index',compact('brand'));
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
            return view('frontend.admin.brand.create');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        if(Session::get('cus_id')==1){
            $brand = new Brand([
               'name' => $request->name,
               'description' => $request->description
           ]);
            $brand->save();
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
            $brand = Brand::findOrfail($id);
            return view('frontend.admin.brand.detail',compact('brand'));
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
            $brand = Brand::findOrfail($id);
            return view('frontend.admin.brand.edit',compact('brand'));
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
    public function update(BrandRequest $request, $id)
    {
        if(Session::get('cus_id')==1){
            $brand = Brand::findOrfail($id);
            $brand->name = $request->name;
            $brand->description = $request->description;

            $brand->update();
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
        //
        if(Session::get('cus_id')==1){
            $brand = Brand::findOrfail($id);
            $product = Product::where('brand_id',$id)->first();
            if ($brand && $product==null) {
                $brand->delete();
                return redirect('brand')->with('success','Delete successfully!');
            } 
            return back()->with('error','You cannot delete it because it is already used in another table!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }
    public function productbrand($id){
        if(Session::get('cus_id')==1){
            $product =Brand::findOrfail($id)->product()->get();
            return view('frontend.admin.product.index',compact('product'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }
}
