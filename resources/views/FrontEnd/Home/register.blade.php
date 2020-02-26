@extends('Shared.template')

@section('title','Register')

@section('content')
<div class="row">
  <div style="margin: 0 auto" class="col-md-8">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <br>
    <br>
    {!! Form::open(['url' => 'registerconfirm', 'method' => 'post']) !!}
    <p class="btn btn-success col-md">Sign up for an account</p><br>
    <div class="row">

      <div class="col-md">
        <div class="form-group">
          {{ Form::label('', 'First Name') }} 
          {{ Form::text('first_name', '',['class' => 'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('', 'Username') }} 
          {{ Form::text('username', '',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('', 'Password') }} 
          {{ Form::password('password',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('', 'Postal Address') }} 
          {{ Form::text('postal_address', '',['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md">
        <div class="form-group">
          {{ Form::label('', 'Last Name') }} 
          {{ Form::text('last_name', '',['class' => 'form-control']) }}
        </div>
                <div class="form-group">
          {{ Form::label('', 'Email') }} 
          {{ Form::email('email', '',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('', 'Confirm Password') }} 
          {{ Form::password('confirm_password',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('', 'Physical Address') }} 
          {{ Form::text('physical_address', '',['class' => 'form-control']) }}
        </div>
      </div>


    </div>
    <span class="badge badge-light">Clicking on the register means you have agreed to our terms and services!</span>
    <br>
    <br>
    {{ Form::submit('Register',['class' => 'btn btn-success']) }}

    {!! Form::close() !!}
  </div>
</div>
@endsection
@section('script')
@include('shared.script')
@endsection


