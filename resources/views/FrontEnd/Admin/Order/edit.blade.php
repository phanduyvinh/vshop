@extends('Shared.admin')

@section('title','Update Order')

@section('content')
<div class="row">
	<div style="margin: 0 auto" class="col-md-8">
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
		<br>
		<div class="form-group">
			{!! Form::model($order,['route' => ['order.update',$order->id], 'method' => 'put']) !!}
			<div class="row">
				<p class="btn btn-primary col-md">Edit your order</p><br></div>
				<div class="form-group">
					{{ Form::label('', 'Transaction date') }} 
					{{ Form::text('transaction_date', date('H:i:s d-m-Y',strtotime($order->transaction_date)),['class' => 'form-control','readonly']) }}
				</div>
				<div class="form-group">
					{{ Form::label('Status') }} 
					{{ Form::text('status', $order->status,['class' => 'form-control']) }}
				</div>
				<br>
				<br>
				{{ Form::submit('Save',['class' => 'btn btn-primary']) }}

				{!! Form::close() !!}
			</div>
		</div>
	</div><br/>
	@endsection
	@section('script')
	@include('shared.script')
	@endsection


