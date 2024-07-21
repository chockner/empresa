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
        @foreach ($personas as $persona)
            <tr>
                <td>
                    <a href="{{ route('personas.show', $persona) }}">{{ $persona->cPerApellido }}</a>
                </td>
            </tr><br>
        @endforeach
    @else
        <li>No existe ningun servicios</li>
    @endif


@endsection
