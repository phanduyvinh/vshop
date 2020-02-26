@extends('Shared.admin')

@section('title','Create a new Product')

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
			{!! Form::open(['url' => 'product', 'method' => 'post', 'files' => true]) !!}
			<div class="row">
				<p class="btn btn-primary col-md">Create new product</p><br></div>
				<div class="form-group">
					{{ Form::label('', 'Product Name') }} 
					{{ Form::text('product_name', '',['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Price') }} 
					{{ Form::number('price', '',['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Description') }} 
					{{ Form::textarea('description', '',['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('', 'Image') }} 
					{{ Form::file('image',['class' => 'form-control']) }} 
				</div>
				<div class="form-group">
					{{ Form::label('', 'Category') }} 
					{{ Form::select('category_id', $category,'',['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('theloai', 'Brand') }} 
					{{ Form::select('brand_id', $brand,'',['class' => 'form-control']) }}
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


