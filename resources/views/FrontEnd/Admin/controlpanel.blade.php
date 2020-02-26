@extends('Shared.admin')

@section('title','Statistical')

@section('content')
<div class="col-md-8 mx-auto">
	<h4 class="btn btn-primary text-center col-md">Statistical</h4>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td>● Product</td>
				<td>{{$product}}</td>
			</tr>
			<tr>
				<td>● Brand</td>
				<td>{{$brand}}</td>
			</tr>
			<tr>
				<td>● Category</td>
				<td>{{$category}}</td>
			</tr>
			<tr>
				<td>● Customer</td>
				<td>{{$customer}}</td>
			</tr>
			<tr>
				<td>● Order</td>
				<td>{{$order}}</td>
			</tr>
		</tbody>
	</table>
	<button class="btn btn-primary col-md mx-auto"></button>
</div>
<br/>
@endsection
@section('script')
@include('shared.script')
@endsection
