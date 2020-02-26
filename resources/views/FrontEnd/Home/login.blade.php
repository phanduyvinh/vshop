@extends('Shared.template')
@section('title','Login')

@section('content')
<div class="container">
    @if (session('message'))
            <div class="alert alert-success text-center">
                  <p>{{ session('message') }}</p>
            </div>
    @elseif (session('error'))
            <div class="alert alert-danger text-center">
                  <p>{{ session('error') }}</p>
            </div>
    @endif
    <div class="row">
        {!! Form::open(['url' => 'confirmlogin', 'method' => 'post','class' =>'col-md-6 mx-auto']) !!}
          <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter your username">
            <small id="emailHelp" class="form-text text-muted">We'll never share your infomation with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>    
    {!! Form::close() !!} 
    </div>

</div>
    

@endsection
@section('script')
    @include('shared.script')
@endsection