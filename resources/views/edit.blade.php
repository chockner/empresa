@extends('layout')

@section('title', 'Editar Persona')

@section('content')

    <table cellpadding="3" cellspaceing="5">
        <tr>
            @auth
                <th colspan="4">Editar Persona</th>
            @endauth

        </tr>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('personas.update', $persona->id) }}" method="post" enctype="multipart/form-data">
            @include('partials.form', ['btnText' => 'Editar'])>
            @csrf @method('PUT')
            <tr>
                <th>Apellido</th>
                <td><input type="text" id="cPerApellido" name="cPerApellido" value="{{ $persona->cPerApellido }}"></td>

            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" id="cPerNombre" name="cPerNombre" value="{{ $persona->cPerNombre }}"></td>

            </tr>
            <tr>
                <th>Direccion</th>
                <td><input type="text" id="cPerDireccion" name="cPerDireccion" value="{{ $persona->cPerDireccion }}">
                </td>

            </tr>
            <tr>
                <th>Fecha de Nacimiento</th>
                <td><input type="date" id="dPerFecNac" name="dPerFecNac" value="{{ $persona->dPerFecNac }}"></td>

            </tr>
            <tr>
                <th>Edad</th>
                <td><input type="number" id="nPerEdad" name="nPerEdad" value="{{ $persona->nPerEdad }}"></td>

            </tr>
            <tr>
                <th>Sexo</th>
                <td>
                    <input type="radio" id="Masculino" name="cPerSexo" value="Masculino">
                    <label for="Masculino">Masculino</label>
                    <input type="radio" id="Femenino" name="cPerSexo" value="Femenino">
                    <label for="Femenino">Femenino</label>
                </td>

            </tr>
            <tr>
                <th>Sueldo</th>
                <td><input type="number" id="nPerSueldo" name="nPerSueldo" value="{{ $persona->nPerSueldo }}"></td>

            </tr>
            <th>Estado Civil</th>
            <td>
                <input type="radio" id="Casado" name="nPerEstado" value="1">
                <label for="Casado">Casado</label>
                <input type="radio" id="Soltero" name="nPerEstado" value="0">
                <label for="Soltero">Soltero</label>
            </td>
            <tr>
                <td colspan="2" align="center"><button>Editar</button></td>
            </tr>
        </form>
    </table>
@endsection
