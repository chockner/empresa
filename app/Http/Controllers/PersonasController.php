<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Http\Requests\CreatePersonaRequest;
use GuzzleHttp\Middleware;

class PersonasController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth')->only('create', 'edit'); */
        $this->middleware('auth')->except('index', 'show');
    }
    public function index()
    {
        $personas = Persona::get();

        return view('personas', compact('personas'));
    }
    public function show($id)
    {
        return view('show', [
            'persona' => Persona::find($id)
        ]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(CreatePersonaRequest $request)
    {
        /* $camposv = request()->validate([
            'cPerApellido' => 'required',
            'cPerNombre' => 'required',
            'cPerDireccion' => 'required',
            'dPerFecNac' => 'required',
            'nPerEdad' => 'required',
            'cPerSexo' => 'required',
            'nPerSueldo' => 'required',
            'nPerEstado' => 'required'
        ]);
        Persona::create($camposv); */

        Persona::create($request->validated());

        return redirect()->route('personas.index');
    }
    public function edit(Persona $id)
    {
        return view('edit', [
            'persona' => $id
        ]);
    }
    public function update(Persona $id)
    {
        $id->update([
            'cPerApellido' => request('cPerApellido'),
            'cPerNombre' => request('cPerNombre'),
            'cPerDireccion' => request('cPerDireccion'),
            'dPerFecNac' => request('dPerFecNac'),
            'nPerEdad' => request('nPerEdad'),
            'cPerSexo' => request('cPerSexo'),
            'nPerSueldo' => request('nPerSueldo'),
            'nPerEstado' => request('nPerEstado')
        ]);
        /* $persona->update($request->validated());
        return redirect()->route('personas.show', $persona->id); */
        return redirect()->route('personas.show', $id);
    }
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index');
    }
}
