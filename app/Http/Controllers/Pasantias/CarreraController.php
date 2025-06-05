<?php

namespace App\Http\Controllers\Pasantias;

use App\Http\Controllers\Controller;
use App\Models\{
    Carrera,
    Facultad
};
use Inertia\Inertia;

use App\Http\Requests\Pasantias\{CarreraStoreRequest, CarreraUpdateRequest};

class CarreraController extends Controller
{
    public function index()
    {   
        $carreras = Carrera::with(['facultad'])->get()
            ->orderBy('nombre')->paginate(10)
            ->paginated(10); 

        return Inertia::render('carreras/index', [
            'carreras' => $carreras,
        ]);
    }

    public function create()
    {
        return Inertia::render('carreras/create', [
            'facultades' => Facultad::all(),
        ]);
    }

    public function store(CarreraStoreRequest $request)
    {
        $validated = $request->validated();

        $carrera = Carrera::create([
            'nombre' => $validated['nombre'],
            'facultad_id' => $validated['facultad_id'],
        ]);

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera creada correctamente.');
    }

    public function edit(Carrera $carrera)
    {
        return Inertia::render('carreras/edit', [
            'carreras' => $carreras->load([
                'nombre',
                'facultad_id'
            ]),
        ]);
    }

    public function update(CarreraUpdateRequest $request, Carrera $carrera)
    {
        $validated = $request->validated();

        $carrera->update([
            'nombre' => $validated['nombre'],
            'facultad_id' => $validated['facultad_id']
        ]);

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera actualizada correctamente.');
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index')
            ->with('success', 'Carrera eliminada correctamente.');
    }

    public function show(Carrera $carrera)
    {
        return Inertia::render('carreras/show', [
            'carreras' => $carrera->load([
                'nombre',
                'facultad_id'
            ]),
        ]);
    }
}