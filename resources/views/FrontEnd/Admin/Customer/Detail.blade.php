@extends('Shared.admin')

@section('title','Detail')

@section('content')

<div style="margin: 0 auto" class="col-md-8">
	<h3 class="text-center btn btn-primary col-md">Customer Detail</h3>
	<table class="table table-bordered">

		<tbody>
			<tr>
				<td>● Firstname</td>
				<td>{{$customer->first_name}}</td>
			</tr>
			<tr>
				<td>● Lastname</td>
				<td>{{$customer->last_name}}</td>
			</tr>
			<tr>
				<td>● Username</td>
				<td>{{$customer->username}}</td>
			</tr>
			<tr>
				<td>● Email</td>
				<td>{{$customer->email}}</td>
			</tr>
			<tr>
				<td>● Postal Address</td>
				<td>{{$customer->postal_address}}</td>
			</tr>
			<tr>
				<td>● Address</td>
				<td>{{$customer->physical_address}}</td>
			</tr>
			<tr>
				<td>● Order</td>
				<td>{{$order}}</td>
			</tr>
		</tbody>
	</table>
</div>
<br/>
@endsection
@section('script')
@include('shared.script')
@endsection


