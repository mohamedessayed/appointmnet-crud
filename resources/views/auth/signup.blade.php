@extends('layout.app')


@section('title','Sign up')


@section('main')

<div class="container my-5">


  @if (session('error'))

      <div class="alert alert-danger mb-3">
        {{ session('error') }}
      </div>
      
    @endif


    <form method="POST" action="{{ route('create.account') }}">

      @csrf

      <div class="mb-3">
    <label for="userName" class="form-label">User name</label>
    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="userName">
    @error('name')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    @error('email')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="exampleInputPassword1">
    @error('password')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" id="exampleInputPassword1">
    @error('password_confirmation')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>


@endsection