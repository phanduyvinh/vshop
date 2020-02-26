@extends('Shared.admin')

@section('title','Category')

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
			<a class="btn btn-primary" href="{{ route('category.create') }}">Create a new category</a><br/><br/>
			<table id="example" class="table table-hover table-bordered text-center">
				<thead class="btn-light">
					<tr>
						<th>Numeric</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach($category as $key => $category)
					<tr>
						<td>{{ ++$key }}</td>
						<td><a href="{{ route('productIncategory',$category->id) }}">{{ $category->name }}</a></td>
						<td>{{ $category->description }}</td>
						<td>
							<div style="float: left;margin-left: 34%;">
								<button class="btn btn-primary"><a class="text-white" href="{{ route('category.show',$category->id) }}">Detail</a></button>
								<button class="btn btn-primary"><a class="text-white" href="{{ route('category.edit',$category->id) }}">Edit</a></button>
							</div>
							<div style="float: left; margin-left: 5px;">
								{!! Form::open(['route' => ['category.destroy',$category->id], 'method' => 'DELETE']) !!}
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
