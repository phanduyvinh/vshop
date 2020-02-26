@extends('Shared.template')
@section('title','Account')

@section('content')
<div class="container">
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
  @if (session('success'))
  <div class="alert alert-success text-center">
    <p>{{ session('success') }}</p>
  </div>
  @endif
  <h3>Hello, {{ Session::get('cus_name') }}</h3>
  {!! Form::model($customer,['route' => ['update_account',$customer->id], 'method' => 'put']) !!}
  <h4><span class="badge badge-info">Your infomation:</span></h4>
  <div class="row">

    <div class="col-xl">
      <div class="form-group">
        {{ Form::label('', 'First Name') }} 
        {{ Form::text('first_name', $customer->first_name,['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('', 'Username') }} 
        {{ Form::text('username', $customer->username,['class' => 'form-control','readonly']) }}
      </div>
      <div class="form-group">
        {{ Form::label('', 'Email') }} 
        {{ Form::email('email', $customer->email,['class' => 'form-control']) }}
      </div>
    </div>
    <div class="col-xl">
      <div class="form-group">
        {{ Form::label('', 'Last Name') }} 
        {{ Form::text('last_name', $customer->last_name,['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('', 'Postal Address') }} 
        {{ Form::text('postal_address', $customer->postal_address,['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('', 'Physical Address') }} 
        {{ Form::text('physical_address', $customer->physical_address,['class' => 'form-control']) }}
      </div>
      {{ Form::submit('Update Infomation',['class' => 'btn btn-success']) }}
      <a class="btn btn-primary" href="{{ route('changepassword') }}">Change Password</a>
    </div>
    {!! Form::close() !!}   
  </div>
  <h4><span class="badge badge-info">Your order:</span></h4>
  <table class="table table-hover table-bordered text-center">
    <thead class="btn-success">
      <tr>
        <th>Numeric</th>
        <th>Order Number</th>
        <th>Transaction Date</th>
        <th>Status</th>
        <th>Total Amount</th>
        <th colspan = "3">Action</th>
      </tr>

    </thead>
    <tbody>
      @foreach($order as $key => $order)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ date('H:i:s d-m-Y',strtotime($order->transaction_date)) }}</td>
        <td>
          @if($order->status=="Wait for confirmation")
          <h5><span class="badge badge-info">{{ $order->status }}</span></h5>
          @else
          <h5><span class="badge badge-success">{{ $order->status }}</span></h5>
          @endif
        </td>
        <td>{{ $order->total_amount }}$</td>


        <td>
          <div style="float: left;margin-left: 18%;">
            <button class="btn btn-primary"><a class="text-white" href="{{ route('orderdetail',$order->id) }}">Detail</a></button>
          </div>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>


</div>


@endsection
@section('script')
@include('shared.script')
@endsection