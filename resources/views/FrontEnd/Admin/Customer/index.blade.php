@extends('Shared.admin')

@section('title','Customer')

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
			<table id="example" class="table table-hover table-bordered text-center">
				<thead class="btn-light">
					<tr>
						<th>Numeric</th>
						<th>Fullname</th>
						<th>Username</th>
						<th>Email</th>
						<th>Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach($customer as $key => $customer)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $customer->first_name." ".$customer->last_name }}</td>
						<td>{{ $customer->username }}</td>
						<td>{{ $customer->email }}</td>
						<td>
							<div style="float: left;margin-left: 18%;">
								<button class="btn btn-primary"><a class="text-white" href="{{ route('customer.show',$customer->id) }}">Detail</a></button>
								<button class="btn btn-primary"><a class="text-white" href="{{ route('customer.edit',$customer->id) }}">Edit</a></button>
							</div>
							<div style="float: left; margin-left: 5px;">
								{!! Form::open(['route' => ['customer.destroy',$customer->id], 'method' => 'DELETE']) !!}
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
