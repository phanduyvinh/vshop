@extends('Shared.template')

@section('title',$product->product_name)

@section('content')
		<div class="row">
			
			<div class="col-md-3">
				@include('frontend.home.menu_left')
			</div>
			<div class="col-md-8 mx-auto">
			<br/>
				<a href="{{ route('addCart',$product->id) }}" class="btn btn-success float-right">Add to cart</a>
				<h3 class="text-center text-info">{{ $product->product_name }}</h3><br/>
				<img style="display: block;" width="25%" class="mx-auto" src="{{ asset('/Upload/'.$product->image) }}">
				<button class="btn btn-primary col-md"></button>
				<div style="padding: 40px" class="border border-primary col-md-8 mx-auto">
					<h4 class=""><span class="badge badge-info">Product Infomation</span></h4>
					<p class="text-dark"> ● Product code: {{ $product->product_code }}</p>
					<p class="text-dark"> ● Price: {{ $product->price }}$</p>
					<p class="text-dark"> ● Brand: <a href="{{ route('productbrand',$product->brand_id) }}">{{ $product->brand->name }}</a></p>
					<p class="text-dark"> ● Category: <a href="{{ route('productcategory',$product->category_id) }}">{{ $product->category->name }}</a></p>
					<h4 class=""><span class="badge badge-info">Description</span></h4>
				<p class="text-dark">{{ $product->description }}</p>
				</div>	
			</div>
		</div>
@endsection
@section('script')
	@include('shared.script')
@endsection
