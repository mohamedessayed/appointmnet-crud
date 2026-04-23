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

<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">patient full name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">clinic</label>
    <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="clinic 1">clinic 1</option>
        <option value="clinic 2">clinic 2</option>
        <option value="clinic 3">clinic 3</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPrice" class="form-label">price</label>
    <input type="number" min='1' class="form-control" id="exampleInputPrice">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@endsection