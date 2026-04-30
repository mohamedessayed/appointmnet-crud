@extends('layout.app')


@section('title','appointment create page')


@section('main')

<div class="container my-5">

    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Appointments</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create appointment</li>
  </ol>
</nav>


@if ($errors->any())
    <div class="alert alert-danger mb-3">

        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>

    </div>
@endif

<form method="POST" action="{{ route('appointment.store') }}">
    
    @csrf


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">patient full name</label>
    <input type="text" name="pateint" class="form-control" id="exampleInputEmail1" value="{{ old('patient') }}">
    @error('pateint')
        <div class="my-2">

            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">clinic</label>
    <select name="clinic" class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($clinics as $clinic)
        <option {{old('clinic') === $clinic->id ? 'selected':''}} value="{{$clinic->id}}">{{$clinic->name}}</option>
        @endforeach
    </select>

    @error('clinic')
        <div class="my-2">
            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPrice" class="form-label">price</label>
    <input name='price' value="{{ old('price') }}" type="number" min='1' class="form-control" id="exampleInputPrice">

    @error('price')
        <div class="my-2">

            <span class="text-danger">{{$message}}</span>
        </div>
    @enderror
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@endsection