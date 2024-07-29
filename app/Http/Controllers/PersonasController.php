<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Http\Requests\CreatePersonaRequest;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Storage;

class PersonasController extends Controller
{
    public function __construct()
    {
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
        $persona = new Persona($request->validated());
        $persona->image = $request->file('image')->store('images');
        $persona->save();

        return redirect()->route('personas.index')->with('estado', 'Persona registrada con exito');
    }
    public function edit(Persona $persona)
    {
        return view('edit', compact('persona'));
    }
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'cPerApellido' => 'required',
            'cPerNombre' => 'required',
            'cPerDireccion' => 'required',
            'dPerFecNac' => 'required',
            'nPerEdad' => 'required',
            'cPerSexo' => 'required',
            'nPerSueldo' => 'required',
            'nPerEstado' => 'required'
        ]);
        // Si se ha subido una nueva imagen
        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($persona->image) {
                Storage::delete($persona->image);
            }
            // Guarda la nueva imagen
            $persona->image = $request->file('image')->store('images');
            $persona->save();
        }

        $persona->update([
            'cPerApellido' => request('cPerApellido'),
            'cPerNombre' => request('cPerNombre'),
            'cPerDireccion' => request('cPerDireccion'),
            'dPerFecNac' => request('dPerFecNac'),
            'nPerEdad' => request('nPerEdad'),
            'cPerSexo' => request('cPerSexo'),
            'nPerSueldo' => request('nPerSueldo'),
            'nPerEstado' => request('nPerEstado')
        ]);

        return redirect()->route('personas.show', $persona->id)
            ->with('estado', 'persona actualizado con éxito');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index');
    }
}
