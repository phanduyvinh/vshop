@extends('Shared.template')

@section('title','Change password')

@section('content')
<div class="row">

	<div class="col-xl-3 mx-auto">

		@if (session('success'))
		<div class="alert alert-success text-center">
			<p>{{ session('success') }}</p>
		</div>
		@elseif (session('error'))
		<div class="alert alert-danger text-center">
			<p>{{ session('error') }}</p>
		</div>
		@endif
		{!! Form::open(['url' => 'confirmpassword', 'method' => 'post']) !!}
		<div class="form-group">
			{{ Form::label('', 'Old password') }} 
			{{ Form::password('old_password',['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('', 'New password') }} 
			{{ Form::password('password',['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('', 'Confirm password') }} 
			{{ Form::password('confirm_password',['class' => 'form-control']) }}
		</div>
		{{ Form::submit('Update Password',['class' => 'btn btn-success']) }}
		<a class="btn btn-primary" href="{{ route('account') }}">Back</a>
		{!! Form::close() !!} 
	</div>
</div>
{!! Form::close() !!}   
@endsection
@section('script')
@include('shared.script')
@endsection
