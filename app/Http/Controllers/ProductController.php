<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderDetail;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('cus_id')==1){
            $product = Product::all();
            return view('frontend.admin.product.index',compact('product'));
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
            $brand = Brand::pluck('name','id')->toArray();
            $category = Category::pluck('name','id')->toArray();
            return view('frontend.admin.product.create',compact('brand','category'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if(Session::get('cus_id')==1){
        // check id cua post_id
            $category_id = $request->category_id;
            $brand_id = $request->brand_id;
            // $category = Category::findOrfail($category_id);
            // $brand = Brand::findOrfail($brand_id);

        //tao product code
            $product_code = rand(1000,9999);
        //lay du lieu

        //Kiểm tra file
            if ($request->hasFile('image')) {
                $file = $request->image;
                $file_name = $file->getClientOriginalName();
            //upload file 
                $file->move('Upload', $file_name);
                $product = new Product([
                'product_code' => $product_code,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $file_name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id
            ]);
            // $category->product()->save($product);
            // $brand->product()->save($product);
            $product->save();
            return back()->with('success','Data saved successfully!');
            }
            return back()->with('error','Image is required!');
            
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
            $product = Product::findOrfail($id);
            $order = OrderDetail::where('product_id',$id)->count();
            return view('frontend.admin.product.detail',compact('product','order'));
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
            $product = Product::findOrfail($id);
            $brand = Brand::pluck('name','id')->toArray();
            $category = Category::pluck('name','id')->toArray();
            return view('frontend.admin.product.edit',compact('brand','category','product'));
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
    public function update(ProductRequest $request, $id)
    {
        if(Session::get('cus_id')==1){
        //Kiểm tra file
            if ($request->hasFile('image')) {
                $file = $request->image;
                $file_name = $file->getClientOriginalName();
            //upload file 
                $file->move('Upload', $file_name);
            }
            $product = Product::findOrfail($id);
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->description = $request->description;
            $product->price = $request->price;
            if($request->hasFile('image')){
                $product->image = $file_name;
            }
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->update();
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
            $orderdetail = OrderDetail::where('product_id',$id)->first();
            $product = Product::findOrfail($id);
            if ($product&& $orderdetail==null) {
                $product->delete();
                return back()->with('success','Delete successfully!');
            } 
            return back()->with('error','You cannot delete it because it is already used in another table!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }
}
