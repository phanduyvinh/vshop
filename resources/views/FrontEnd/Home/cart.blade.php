@extends('Shared.template')

@section('title','Cart')

@section('content')
<div class="row">
	<div style="margin: 0 auto" class="col-md-8">
		<br>
		@if (session('message'))
		<div class="alert alert-success">
			<p class="text-center">{{ session('message') }}</p>
		</div>
		@elseif(session('error'))
		<div class="alert alert-error">
			<p class="text-center">{{ session('error') }}</p>
		</div>
		@endif

		<div class="form-group">
			@if(Cart::count()==0)
			<h3 class="text-center">Cart is empty, please add products <a class="text text-info" href="{{ route('home') }}">Continue shopping ...</a></h3>
			@else
			<a class="btn btn-danger" href="{{ route('delallcart')}}">Delete all</a>
			<table class="table table-hover table-bordered text-center">
				<thead class="btn-success">
					<tr>
						<th>Numeric</th>
						<th>cart Code</th>
						<th>cart Name</th>
						<th>Image</th>
						<th width="2">Quantity</th>
						<th>Price</th>
						<th colspan = "3">Action</th>
					</tr>

				</thead>
				<tbody>
					<?php $i=1; ?>
					@foreach($cart as $cart)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $cart->options->product_code }}</td>
						<td>{{ $cart->name }}</td>
						<td><img width="75px" src="Upload/{{ $cart->options->img }}"></td>
						<td>
							{!! Form::open(['url' => 'setquantity', 'method' => 'post']) !!}
							{{ Form::number('quantity', $cart->qty,['class' => 'form-control','min'=>'1'])}}
							{{ Form::text('rowId', $cart->rowId,['class' => 'form-control','hidden'=> 'hidden'])}}
							{{ Form::submit('Change',['class' => 'btn btn-primary']) }}
							{!! Form::close() !!}
						</td>
						<td>{{ $cart->price }}</td>
						<td>
							<a href="{{ route('delcart',$cart->rowId) }}">Delete</a>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>

			<h3>Total: {{ Cart::total() }} $</h3>
			<div class="alert alert-info text-right" role="alert">If you do not have any changes, you can make payment here
				<button class="btn btn-success" onclick="myFunction()" >Checkout Now</button>
			</div>
			@endif
		</div>

	</div>
</div>

@endsection
@section('script')
@include('shared.script')
@endsection
