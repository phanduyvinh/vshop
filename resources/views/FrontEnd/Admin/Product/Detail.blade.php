@extends('Shared.admin')

@section('title','Detail')

@section('content')

<div style="margin: 0 auto" class="col-md-8">
	<h3 class="text-center btn btn-primary col-md">Product Detail</h3>
	<table class="table table-bordered">

		<tbody>
			<tr>
				<td>● Product code</td>
				<td>{{$product->product_code}}</td>
			</tr>
			<tr>
				<td>● Product name</td>
				<td>{{$product->product_name}}</td>
			</tr>
			<tr>
				<td>● Image</td>
				<td><img width="70px" src="{{ asset('Upload/'.$product->image)}}"></td>
			</tr>
			<tr>
				<td>● Description</td>
				<td>{{$product->description}}</td>
			</tr>
			<tr>
				<td>● Price</td>
				<td>{{$product->price}}$</td>
			</tr>
			<tr>
				<td>● Brand</td>
				<td><a href="{{ route('brand.show',$product->brand->id) }}">{{$product->brand->name}}</a></td>
			</tr>
			<tr>
				<td>● Category</td>
				<td><a href="{{ route('category.show',$product->category->id) }}">{{$product->category->name}}</a></td>
			</tr>
			<tr>
				<td>● Has been bought</td>
				<td>{{$order}}</td>
			</tr>

		</tbody>
	</table>
</div>
<br/>
@endsection
@section('script')
@include('shared.script')
@endsection


