<?php

namespace App\Http\Controllers\Pasantias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Facultad;

class FacultadController extends Controller
{
    public function index()
    {   
        $facultades = Facultad::all()
            ->orderBy('nombre')->paginate(10)
            ->paginated(10); 

        return Inertia::render('facultades/index', [
            'facultades' => $facultades,
        ]);
    }

    public function create()
    {
        return Inertia::render('facultades/create');
    }

    public function store(FacultadStoreRequest $request)
    {
        $validated = $request->validated();

        $facultad = Facultad::create([
            'nombre' => $validated['nombre'],
        ]);

        return redirect()->route('facultades.index')
            ->with('success', 'Facultad creada correctamente.');
    }

    public function edit(Facultad $facultad)
    {
        return Inertia::render('facultades/edit', [
            'facultades' => $facultades->load([
                'nombre'
            ]),
        ]);
    }

    public function update(FacultadUpdateRequest $request, Facultad $facultad)
    {
        $validated = $request->validated();

        $facultad->update([
            'nombre' => $validated['nombre']
        ]);

        return redirect()->route('facultades.index')
            ->with('success', 'Facultad actualizada correctamente.');
    }

    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
        return redirect()->route('facultades.index')
            ->with('success', 'Facultad eliminada correctamente.');
    }

    public function show(Facultad $facultad)
    {
        return Inertia::render('facultades/show', [
            'facultad' => $facultad->load([
                'nombre',
            ]),
        ]);
    }
}