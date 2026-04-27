@extends('layout.app')


@section('title','Home page')


@section('main')

<div class="container my-5">


  @if (session('error'))

      <div class="alert alert-danger mb-3">
        {{ session('error') }}
      </div>
      
    @endif

<form method="POST" action="{{ route('login') }}">
  @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    @error('email')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="exampleInputPassword1">
    @error('password')
      <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>

</div>


@endsection