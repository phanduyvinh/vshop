<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - V-Shop</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

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
		height: 380px;
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
	function myFunction() {
		var result = confirm("NOTE: Are you sure you want to order?");
		if (result) {
			window.location.replace('checkout');
		}
		
	}
</script>
</head>
<body>
	<div class="container-fluid">
		@include('shared.header')
		<hr/>
		@yield('content')

		@include('shared.footer')
	</div>
	@yield('script')
</body>
</html>