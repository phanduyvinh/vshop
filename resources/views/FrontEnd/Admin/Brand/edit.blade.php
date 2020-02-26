@extends('Shared.admin')

@section('title','Edit Brand')

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
			{!! Form::model($brand,['route' => ['brand.update',$brand->id], 'method' => 'put']) !!}
			<div class="row">
				<p class="btn btn-primary col-md">Brand</p><br></div>
				<div class="form-group">
					{{ Form::label('', 'Name') }} 
					{{ Form::text('name',$brand->name,['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Description') }} 
					{{ Form::textarea('description', $brand->description,['class' => 'form-control']) }}
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


