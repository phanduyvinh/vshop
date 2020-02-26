@extends('Shared.admin')

@section('title','Product')

@section('content')
<div class="row">
	<div style="margin: 0 auto" class="col-md">
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
			<a class="btn btn-primary" href="{{ route('product.create') }}">Create a new product</a><br/><br/>
			<table id="example" style="width:100%" class="table table-hover table-bordered text-center">
				<thead class="btn-light">
					<tr>
						<th>Numeric</th>
						<th>Product Code</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach($product as $key => $product)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $product->product_code }}</td>
						<td>{{ $product->product_name }}</td>
						<td><img width="50px" src="{{asset('Upload/'.$product->image) }}"></td>

						<td>{{ $product->price }}$</td>
						<td>
							<div style="float: left;margin-left: 18%;">
								<button class="btn btn-primary"><a class="text-white" href="{{ route('product.show',$product->id) }}">Detail</a></button>
								<button class="btn btn-primary"><a class="text-white" href="{{ route('product.edit',$product->id) }}">Edit</a></button>
							</div>
							<div style="float: left; margin-left: 5px;">
								{!! Form::open(['route' => ['product.destroy',$product->id], 'method' => 'DELETE']) !!}
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
