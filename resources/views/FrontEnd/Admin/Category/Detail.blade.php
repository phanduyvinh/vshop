@extends('Shared.admin')

@section('title','Detail')

@section('content')
	
			<div style="margin: 0 auto" class="col-md-8">
				<h3 class="text-center btn btn-primary col-md">Category Detail</h3>
			<table class="table table-bordered">

		<tbody>
			<tr>
				<td>● Category Name</td>
				<td>{{$category->name}}</td>
			</tr>
			<tr>
				<td>● Description</td>
				<td>{{$category->description}}</td>
			</tr>

		</tbody>
	</table>
			</div>
			<br/>
@endsection
@section('script')
	@include('shared.script')
@endsection


