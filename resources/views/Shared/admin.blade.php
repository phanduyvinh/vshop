<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - V-Shop Control Panel</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>

<style type="text/css">
	.img-product{
		height: 250px;
	}
	.img-product:hover{
		border-radius: 15px;
	}
	.card{
		float: left;
		width: 30%;
		margin: 1%;
	}
	.card:hover{
		border: 1px solid red;
		border-radius: 15px;
	}
	.bg-dark {
		background-color: #28a745!important;
	}
	.slide{
		height: 360px;
	}

	#page-content {
		flex: 1 0 auto;
	}

	#sticky-footer {
		flex-shrink: none;
	}

	.footer {
		margin-top: 50px;
		background: #007bff;
		background: linear-gradient(to right, #0062E6, #33AEFF);
	}
	.social-media{
		font-size: 40px;
	}
	.cart{
		margin-right: 30px;
	}
	
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	function myFunction() {
		if(!confirm("Are You Sure to delete this"))
			event.preventDefault();
	}
</script>
</head>
<body>
	<div class="container-fluid">
		<!-- Image and text -->
		<nav class="navbar navbar-dark bg-primary">
			<a class="navbar-brand" href="#">
				<img src="{{ asset('logo.png') }}" width="50" height="40" class="d-inline-block align-top" alt="">
				V-Shop Control Panel
			</a>
			<a class="text-danger font-weight-bold" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
		</nav>
		<hr/>
		<div class="row">
			<div class="col-xl-3">
				<div class="list-group">
					<h4 class="text-center btn btn-primary">Control Panel</h4>
					<a href="{{ route('controlpanel') }}" class="list-group-item list-group-item-action"><i class="fa fa-bars" aria-hidden="true"></i> Statistical</a>
					<a href="{{ route('product.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-paypal" aria-hidden="true"></i> Product</a>
					<a href="{{ route('category.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-book" aria-hidden="true"></i> Category</a>
					<a href="{{ route('brand.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-building" aria-hidden="true"></i> Brand</a>
					<a href="{{ route('customer.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-user" aria-hidden="true"></i> Customer</a>
					<a href="{{ route('order.index') }}" class="list-group-item list-group-item-action"><i class="fa fa-credit-card" aria-hidden="true"></i> Order</a>
				</div>
				<a class="btn btn-primary col-md" href="{{ route('home') }}">Back to home</a>
			</div>
			<div class="col-xl-9">
				@yield('content')
			</div>
		</div>
		
		<br/><br/>
		<div class="fixed-bottom">
			<footer id="sticky-footer" class="py-4 btn-light text-white-50">
				<div class="container text-center">
					<small class="text-dark">Copyright &copy; V-Shop</small>
				</div>
			</footer>
		</div>
	</div>
	@yield('script')
</body>
</html>