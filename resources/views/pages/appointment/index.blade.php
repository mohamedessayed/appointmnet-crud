@extends('layout.app')


@section('title','appointments page')


@section('main')

<div class="container my-5">

    <h1 class="mb-3">Appointment System</h1>


    <div class="mb-3">
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Create new appintment</a>
    </div>

    @if (session('success'))

      <div class="alert alert-success mb-3">
        {{ session('success') }}
      </div>
      
    @endif

    @if (count($appointments)>0)
      <div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">paient name</th>
              <th scope="col">clinic</th>
              <th scope="col">price</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ( $appointments as $appointment )
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{ $appointment->pateint }}</td>
              <td>{{ $appointment->clinic }}</td>
              <td>{{ $appointment->price }}</td>
              <td>@mdo</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

        {{ $appointments->links() }}

    </div>

    @else


    <div class="alert alert-warning p-5" role="alert">
      there are no data
    </div>
    @endif


</div>


@endsection