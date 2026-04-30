@extends('layout.app')


@section('title','Clinic view page')


@section('main')

<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Clinics</a></li>
            <li class="breadcrumb-item active" aria-current="page">view clinic</li>
        </ol>
    </nav>


    <div>
        <p>
            <strong>Clinic name:</strong>
        </p>

        <p>
            {{$clinic->name}}
        </p>
    </div>


    <div>
        <h2>Appointments Data:</h2>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">paient name</th>
                    <th scope="col">clinic</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $clinic->appointments as $appointment )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $appointment->pateint }}</td>
                    <td>{{ $clinic->name  }}</td>
                    <td>{{ $appointment->price }}</td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>



</div>


@endsection