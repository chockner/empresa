@extends('layout')

@section('title', 'Servicio | ' . $persona->cPerApellido)

@section('content')

    {{--         @auth
        <tr>
            <td colspan="4">{{ $servicio->titulo }}
                <a href="{{ route('servicios.edit', $servicio) }}">Editar</a>
            </td>
            <td colspan="2">
                <form action="{{ route('servicios.destroy', $servicio) }}", method="POST">
                    @csrf @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
    @endauth --}}

    <tr>
        <td colspan="4">{{ $persona->cPerApellido }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->cPerNombre }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->cPerDireccion }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->dPerFecNac }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->nPerEdad }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->cPerSexo }}</td> |
    </tr>
    <tr>
        <td colspan="4">{{ $persona->nPerSueldo }}</td> |
    </tr>
    <tr>
        @if ($persona->nPerEstado)
            <td colspan="4">Casado</td> |
        @else
            <td colspan="4">Soltero</td> |
        @endif

        {{-- <td colspan="4">{{ $persona->nPerEstado }}</td> | --}}
    </tr>
    <tr>
        <td colspan="4">{{ $persona->created_at }}</td> |
    </tr>
    @auth
        <tr>
            <td colspan="4">
                <a href="{{ route('personas.edit', $persona) }}">Editar</a>
            </td> |
        </tr>
        <tr>
            <td colspan="4">
                <form action="{{ route('personas.destroy', $persona) }}" method="POST">
                    @csrf @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
    @endauth



@endsection
