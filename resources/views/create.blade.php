@extends('layout')

@section('title', 'Registrar Persona')

@section('content')

    <table cellpadding="3" cellspaceing=#5>
        <tr>
            <th colspan="4">Registar Persona</th>
        </tr>

        <form action="{{ route('personas.store') }}" method="post" enctype="multipart/form-data">
            @include('partials.form', ['btnText' => 'Guardar'])
            @csrf
            <tr>
                <th>Apellido</th>
                <td><input type="text" id="cPerApellido" name="cPerApellido"><br>{{ $errors->first('cPerApellido') }}</td>

            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" id="cPerNombre" name="cPerNombre"><br>{{ $errors->first('cPerNombre') }}</td>

            </tr>
            <tr>
                <th>Direccion</th>
                <td><input type="text" id="cPerDireccion" name="cPerDireccion"><br>{{ $errors->first('cPerDireccion') }}
                </td>

            </tr>
            <tr>
                <th>Fecha de Nacimiento</th>
                <td><input type="date" id="dPerFecNac" name="dPerFecNac"><br>{{ $errors->first('dPerFecNac') }}</td>

            </tr>
            <tr>
                <th>Edad</th>
                <td><input type="number" id="nPerEdad" name="nPerEdad"><br>{{ $errors->first('nPerEdad') }}</td>

            </tr>
            <tr>
                <th>Sexo</th>
                <td>
                    <input type="radio" id="Masculino" name="cPerSexo" value="Masculino">
                    <label for="Masculino">Masculino</label>
                    <input type="radio" id="Femenino" name="cPerSexo" value="Femenino">
                    <label for="Femenino">Femenino</label>
                    <br>{{ $errors->first('cPerSexo') }}
                </td>

            </tr>
            <tr>
                <th>Sueldo</th>
                <td><input type="number" id="nPerSueldo" name="nPerSueldo"><br>{{ $errors->first('nPerSueldo') }}</td>

            </tr>
            <th>Estado Civil</th>
            <td>
                <input type="radio" id="Casado" name="nPerEstado" value="1">
                <label for="Casado">Casado</label>
                <input type="radio" id="Soltero" name="nPerEstado" value="0">
                <label for="Soltero">Soltero</label>
                <br>{{ $errors->first('nPerEstado') }}
            </td>
            <tr>
                <td colspan="2" align="center"><button>Guardar</button></td>
            </tr>
        </form>
    </table>
@endsection
