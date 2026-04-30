@extends('layout.app')


@section('title','appointments page')


@section('main')

<div class="container my-5">



    <h1 class="mb-3">Appointment System</h1>


    @if(auth('web')->user()->isAllow('create'))
    <div class="mb-3">
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Create new appintment</a>
    </div>
    @endif

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
              <td>{{ $appointment->clinic?->name ?? 'N/A' }}</td>
              <td>{{ $appointment->price }}</td>
              <td>
    @if(auth('web')->user()->isAllow('delete'))
  
               <form method="post" action="{{ route('appointment.delete', $appointment->id) }}">@csrf @method('delete') <button type="submit" class="btn btn-danger">Delete</button></from>

               @endif 

               @if(auth('web')->user()->isAllow('edit'))
                <a class="btn mx-1 btn-warning" href="{{ route('appointment.edit', $appointment->id) }}">Edit</a>

                @endif
              </td>
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