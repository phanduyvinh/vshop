@extends('Shared.admin')

@section('title','Detail')

@section('content')
	
			<div style="margin: 0 auto" class="col-md-8">
				<h3 class="text-center btn btn-primary col-md">Brand Detail</h3>
			<table class="table table-bordered">

		<tbody>
			<tr>
				<td>● Brand Name</td>
				<td>{{$brand->name}}</td>
			</tr>
			<tr>
				<td>● Description</td>
				<td>{{$brand->description}}</td>
			</tr>

		</tbody>
	</table>
			</div>
			<br/>
@endsection
@section('script')
	@include('shared.script')
@endsection


