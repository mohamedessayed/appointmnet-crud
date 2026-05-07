@extends('layout.app')


@section('title','settings page')



@section('main')

<div class="container my-5">


    <h1> {{ auth('web')->user()?->name ?? 'demo' }}</h1>

    <div>
        <img src={{ asset(auth('web')->user()?->image) }} width='300' />
    </div>

    <div class='my-3 bg-secondary-subtle p-2 rounded-2'>

        <h2>Change Profile Image</h2>

        <form action="{{ route('user.change.image') }}" method="POST" enctype="multipart/form-data">

            @csrf

  <div class="mb-3">
  <label for="formFile" class="form-label">choose image</label>
  <input class="form-control" type="file" name='image' id="formFile">
</div>

@error('image')
        <div class="my-2">

            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  <button type="submit" class="btn btn-primary">change</button>
</form>

    </div>




            <div class='my-3 bg-secondary-subtle p-2 rounded-2'>

        <h2>Change Profile password</h2>

        <form>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">current Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">new Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">confirm new Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>

</div>
@endsection