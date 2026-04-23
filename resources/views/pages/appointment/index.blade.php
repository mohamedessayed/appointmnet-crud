@extends('layout.app')


@section('title','appointments page')


@section('main')

<div class="container my-5">

    <h1 class="mb-3">Appointment System</h1>


    <div class="mb-3">
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Create new appintment</a>
    </div>


    @if (count($appointments)>0)
      <div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>John</td>
              <td>Doe</td>
              <td>@social</td>
            </tr>
          </tbody>
        </table>

    </div>

    @else


    <div class="alert alert-warning p-5" role="alert">
  there are no data
</div>
    @endif


</div>


@endsection