@extends('Shared.admin')

@section('title','Edit Customer')

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
			{!! Form::model($customer,['route' => ['customer.update',$customer->id], 'method' => 'put']) !!}
			<div class="row">
				<p class="btn btn-primary col-md">Create new Customer</p><br></div>
				<div class="form-group">
					{{ Form::label('', 'First Name') }} 
					{{ Form::text('first_name', $customer->first_name,['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Last Name') }} 
					{{ Form::text('last_name', $customer->last_name,['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Username') }} 
					{{ Form::text('username', $customer->username,['class' => 'form-control','readonly']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Email') }} 
					{{ Form::email('email', $customer->email,['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Postal Address') }} 
				</div>
				<div class="form-group">
					{{ Form::text('postal_address', $customer->postal_address,['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Physical Address') }} 
					{{ Form::text('physical_address', $customer->physical_address,['class' => 'form-control']) }}
				</div>
				<br>
				<br>
				{{ Form::submit('Save',['class' => 'btn btn-primary']) }}
				<a class="btn btn-primary" onclick="confirm('Are you sure you want to reset the password')" href="{{ route('resetpassword',$customer->id) }}">Reset Password</a>

				{!! Form::close() !!}
			</div>
		</div>
	</div><br/>
	@endsection
	@section('script')
	@include('shared.script')
	@endsection


