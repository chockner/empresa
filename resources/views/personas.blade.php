@extends('layout')

@section('title', 'Persona')

@section('content')
    <tr>
        @auth
            <td colspan="4">
                <a href="{{ route('personas.create') }}">Registrar Persona</a><br>
            </td>
        @endauth

    </tr>
    <tr>
        <th colspan="4">Listado de Servicios</th><br>
    </tr>

    @if ($personas)
        <div class="container">
            <div class="row">
                @foreach ($personas as $persona)
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $persona->image) }}" class="card-img-top"
                                alt="{{ $persona->cPerApellido }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $persona->cPerApellido }}</h5>
                                <p class="card-text">{{ $persona->cPerNombre }}<br>{{ $persona->cPerApellido }}</p>
                                <a href="{{ route('personas.show', $persona) }}" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <li>No existe ningun servicios</li>
    @endif


@endsection
