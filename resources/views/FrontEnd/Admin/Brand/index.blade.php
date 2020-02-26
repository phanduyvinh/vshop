@extends('Shared.admin')

@section('title','Brand')

@section('content')
<div class="row">
	<div style="margin: 0 auto" class="col-md">

		<br>
		@if (session('success'))
		<div class="alert alert-success">
			<p class="text-center">{{ session('success') }}</p>
		</div>
		@elseif(session('error'))
		<div class="alert alert-danger">
			<p class="text-center">{{ session('error') }}</p>
		</div>
		@endif
		<a class="btn btn-primary" href="{{ route('brand.create') }}">Create a new brand</a>
		<div class="form-group"><br/>
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
					@foreach($brand as $key => $brand)
					<tr>
						<td>{{ ++$key }}</td>
						<td><a href="{{ route('productInbrand',$brand->id) }}">{{ $brand->name }}</a></td>
						<td>{{ $brand->description }}</td>
						<td>
							<div style="float: left;margin-left: 34%;">
								<button class="btn btn-primary"><a class="text-white" href="{{ route('brand.show',$brand->id) }}">Detail</a></button>
								<button class="btn btn-primary"><a class="text-white" href="{{ route('brand.edit',$brand->id) }}">Edit</a></button>
							</div>
							<div style="float: left; margin-left: 5px;">
								{!! Form::open(['route' => ['brand.destroy',$brand->id], 'method' => 'DELETE']) !!}
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
