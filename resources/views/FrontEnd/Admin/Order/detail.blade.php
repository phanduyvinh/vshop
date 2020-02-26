@extends('Shared.admin')

@section('title','Detail')

@section('content')

<div class="row">
	<div style="margin: 0 auto" class="col-md-11">
		<button class="btn btn-primary col-md">Order Infomation</button>
		<table class="table table-bordered">

			<tbody>
				<tr>
					<td>Order number</td>
					<td>{{$order->order_number}}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						@if($order->status=="Wait for confirmation")
						<h5><span class="badge badge-info">{{ $order->status }}</span></h5>
						@else
						<h5><span class="badge badge-success">{{ $order->status }}</span></h5>
						@endif
					</td>
				</tr>
				<tr>
					<td>Transaction date</td>
					<td>{{ date('H:i:s d-m-Y',strtotime($order->transaction_date)) }}</td>
				</tr>
				<tr>
					<td>Receiver</td>
					<td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>{{$order->customer->physical_address}}</td>
				</tr>
				<tr>
					<td>Postal code</td>
					<td>{{$order->customer->postal_address}}</td>
				</tr>
				<tr>
					<td>Total Amount</td>
					<td>{{$order->total_amount}}$</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-hover table-bordered text-center">
			<thead class="btn-light">
				<tr>
					<th>Numeric</th>
					<th>Image</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Sub total</th>
				</tr>

			</thead>
			<tbody>
				@foreach($orderdetail as $key => $orderdetail)
				<tr>
					<td>{{ ++$key }}</td>
					<td><img width="50px" src="/VShop/public/Upload/{{ $orderdetail->product->image }}"></td>
					<td><a href="{{ route('product.show',$orderdetail->product->id) }}">{{ $orderdetail->product->product_name }}</a></td>
					<td>{{ $orderdetail->product->price }}$</td>
					<td>{{ $orderdetail->quantity }}</td>
					<td>{{ $orderdetail->sub_total }}$</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		<a class="btn btn-primary" href="{{ route('order.edit',$order->id) }}">Update order</a>
	</div>

</div><br/>
@endsection
@section('script')
@include('shared.script')
@endsection


