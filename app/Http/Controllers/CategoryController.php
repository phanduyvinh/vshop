<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Session;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('cus_id')==1){
            $category = Category::all();
            return view('frontend.admin.category.index',compact('category'));
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
            return view('frontend.admin.category.create');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(Session::get('cus_id')==1){
            $category = new Category([
             'name' => $request->name,
             'description' => $request->description
         ]);
            $category->save();
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
            $category = Category::findOrfail($id);
            return view('frontend.admin.category.detail',compact('category'));
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
            $category = Category::findOrfail($id);
            return view('frontend.admin.category.edit',compact('category'));
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
    public function update(CategoryRequest $request, $id)
    {
        if(Session::get('cus_id')==1){
            $category = Category::findOrfail($id);
            $category->name = $request->name;
            $category->description = $request->description;

            $category->update();
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
            $category = Category::findOrfail($id);
            $product = Product::where('category_id',$id)->first();
            if ($category && $product==null) {
                $category->delete();
                return redirect()->action('CategoryController@index')->with('success','Delete successfully!');
            } 
            return back()->with('error','You cannot delete it because it is already used in another table!');
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');   
    }

    public function productcategory($id){
        if(Session::get('cus_id')==1){
            $product =Category::findOrfail($id)->product()->get();
            return view('frontend.admin.product.index',compact('product'));
        }
        return redirect('login')->with('error','This page is for administrators! You need to log in to continue');
    }
}
