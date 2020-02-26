@extends('Shared.template')

@section('title','Order Detail')

@section('content')

		<a class="btn btn-success" href="{{ route('account') }}">Quay lại</a>
		<div class="row">
			<div style="margin: 0 auto" class="col-md-8">
				<ul class="list-group">
				  <li class="list-group-item active">Order Infomation</li>
				  <li class="list-group-item"> Order number: {{$order->order_number}}</li>
				  <li class="list-group-item">Status: {{$order->status}}</li>
				  <li class="list-group-item">Transaction date: {{$order->transaction_date}}</li>
				  <li class="list-group-item"> Receiver: {{$order->customer->first_name}} {{$order->customer->last_name}}</li>
				  <li class="list-group-item"> Address: {{$order->customer->physical_address}}</li>
				  <li class="list-group-item"> Postal code: {{$order->customer->postal_address}}</li>
				  <li class="list-group-item">Total Amount: {{$order->total_amount}}$</li>
				</ul>
				<hr/>

				<table class="table table-hover table-bordered text-center">
					<thead class="btn-success">
					<tr>
						<th>Numeric</th>
						<th>Product Code</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Sub total</th>
					</tr>

					</thead>
				<tbody>
					@foreach($orderdetail as $key => $orderdetail)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $orderdetail->product->product_code }}</td>
						<td><img width="50px" src="/VShop/public/Upload/{{ $orderdetail->product->image }}"></td>
						<td>{{ $orderdetail->product->product_name }}</td>
						<td>{{ $orderdetail->product->price }}$</td>
						<td>{{ $orderdetail->quantity }}</td>
						<td>{{ $orderdetail->product->category->name }}</td>
						<td>{{ $orderdetail->product->brand->name }}</td>
						<td>{{ $orderdetail->sub_total }}$</td>
					</tr>
					@endforeach
					
				</tbody>
				</table>

			</div>
			
		</div>
@endsection
@section('script')
	@include('shared.script')
@endsection


