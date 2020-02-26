@extends('Shared.template')

@section('title','Home')

@section('content')
		<div class="row">
			
			<div class="col-xl-3">
				@include('frontend.home.menu_left')
			</div>
			<div class="col-xl-8 mx-auto">
			<br/>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="{{ asset('slide1.jpg') }}" class="d-block w-100 slide" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="{{ asset('slide2.jpg') }}" class="d-block w-100 slide" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="{{ asset('slide3.jpg') }}" class="d-block w-100 slide" alt="...">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div><hr/>
			<br/>

					@foreach($product as $product)
					<div class="card">
					  <img src="{{ asset('Upload/'.$product->image) }}" class="card-img-top img-product" alt="...">
					  <div class="card-body">
					    <h5 class="card-title text-center">{{ $product->product_name }}</h5>
					    <p class="card-text text-danger text-center font-weight-bold">{{ $product->price }} $</p>
					    <a style="float: left;" href="{{ route('productdetail',$product->id) }}" class="btn btn-success col-md-4">Detail</a> 
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
