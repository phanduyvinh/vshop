@extends('Shared.template')

@section('title','Search')

@section('content')
		<div class="row">
			
			<div class="col-xl-3">
				@include('frontend.home.menu_left')
			</div>
			<div class="col-xl-8 mx-auto">
			<br/>
			<h3>Find {{ count($product) }} products</h3>

					@foreach($product as $product)
					<div class="card">
					  <img src="{{ asset('Upload/'.$product->image) }}" class="card-img-top img-product" alt="...">
					  <div class="card-body">
					    <h5 class="card-title text-center">{{ $product->product_name }}</h5>
					    <p class="card-text text-danger text-center font-weight-bold">{{ $product->price }} $</p>
					    <a style="float: left;" href="#" class="btn btn-info col-md-4">Detail</a> 
					    <a style="float: right;" href="{{ route('addCart',$product->id) }}" class="btn btn-success col-md-7">Add to cart</a>
					  </div>
					</div>
					@endforeach
					
			</div>
		</div>
@endsection
@section('script')
	@include('shared.script')
@endsection
