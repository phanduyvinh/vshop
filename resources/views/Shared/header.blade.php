<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img width="75px" height="45px" src="{{ asset('logo.png') }}">
  <a class="navbar-brand" href="{{ route('home') }}">V-Shop</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      @if(Session::has('cus_id'))
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('account') }}"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-danger" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
      </li>
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
      </li>
      @endif
    </ul>
    @if(Session::get('cus_id')==1)
    <a href="{{ route('controlpanel') }}"><button type="button" class="btn btn-danger cart">Control Panel</button></a>
    @endif
    <a href="{{ route('cart.index') }}"><button type="button" class="btn btn-primary cart"><b>Cart</b> <span class="badge badge-light">{{ Cart::count() }}</span></button></a>
    {!! Form::open(['url' => 'productsearch', 'method' => 'get','class' =>'form-inline my-2 my-lg-0']) !!}
    <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
    {!! Form::close() !!}

  </div>
</nav>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{{ route('home') }}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product</li>
  </ol>
</nav>
<br/>
<h3 class="text-center"><span class="badge badge-light">
All products are free shipping</span></h3>
