@extends('Shared.admin')

@section('title','Order')

@section('content')
<div class="row">
	<div style="margin: 0 auto" class="col-md">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<br>
		@if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
		@elseif(session('error'))
		<div class="alert alert-danger">
			<p>{{ session('error') }}</p>
		</div>
		@endif
		<div class="form-group">
			<table id="example" class="table table-hover table-bordered text-center">
				<thead class="btn-light">
					<tr>
						<th>Numeric</th>
						<th>Order Number</th>
						<th>Transaction Date</th>
						<th>Status</th>
						<th>Total Amount</th>
						<th>Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach($order as $key => $order)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $order->order_number }}</td>
						<td>{{ date('H:i:s d-m-Y',strtotime($order->transaction_date)) }}</td>
						<td>
							@if($order->status=="Wait for confirmation")
							<h5><span class="badge badge-info">{{ $order->status }}</span></h5>
							@else
							<h5><span class="badge badge-success">{{ $order->status }}</span></h5>
							@endif
						</td>
						<td>{{ $order->total_amount }}$</td>

						
						<td>
							<div style="float: left;margin-left: 18%;">
								<button class="btn btn-primary"><a class="text-white" href="{{ route('order.show',$order->id) }}">Detail</a></button>
							</div>
							<div style="float: left; margin-left: 5px;">
								{!! Form::open(['route' => ['order.destroy',$order->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('Delete',['class' => 'btn btn-primary','onclick' => 'myFunction()']) !!}

								{!! Form::close() !!}
							</div>
							
							
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			
		</div>
	</div>
</div><br/>
@endsection
@section('script')
@include('shared.script')
@endsection
