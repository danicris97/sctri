<?php

namespace App\Http\Controllers\Pasantias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    Pasantia,
    AlumnoCarrera,
    Docente,
    Convenio,
    ResponsableEmpresa
};
use App\Http\Requests\Pasantias\{PasantiaStoreRequest, PasantiaUpdateRequest};

class PasantiaController extends Controller
{
    public function index()
    {
        $pasantias = Pasantia::with(['alumno_carrera', 'docente', 'convenio', 'responsable_empresa'])->get()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('pasantias/index', [
            'pasantias' => $pasantias,
        ]);
    }

    public function create()
    {
        return Inertia::render('pasantias/create', [
            'alumnos_carrera' => AlumnoCarrera::all(),
            'docentes' => Docente::all(),
            'convenios' => Convenio::all(),
            'responsables_empresa' => ResponsableEmpresa::all(),
        ]);
    }

    public function store(PasantiaStoreRequest $request)
    {
        $validated = $request->validated();

        $pasantia = Pasantia::create([
            'fecha_acta' => $validated['fecha_acta'],
            'fecha_inicio' => $validated['fecha_inicio'],
            'duracion' => $validated['duracion'],
            'fecha_fin' => $validated['fecha_fin'],
            'monto' => $validated['monto'],
            'domicilio' => $validated['domicilio'],
            'tareas' => $validated['tareas'],
            'alumno_carrera_id' => $validated['alumno_carrera_id'],
            'docente_id' => $validated['docente_id'],
            'responsable_empresa_id' => $validated['responsable_empresa_id'],
            'convenio_id' => $validated['convenio_id'],
        ]);

        return redirect()->route('pasantias.index')
            ->with('success', 'Pasantia creada correctamente.');
    }

    public function edit(Pasantia $pasantia)
    {
        return Inertia::render('pasantias/edit', [
            'pasantia' => $pasantia->load([
                'fecha_acta', 
                'fecha_inicio',
                'duracion',
                'fecha_fin',
                'monto',
                'domicilio',
                'tareas',
                'alumno_carrera_id', 
                'docente_id', 
                'convenio_id', 
                'responsable_empresa_id'
            ]),

            'alumnos_carrera' => AlumnoCarrera::all(),
            'docentes' => Docente::all(),
            'convenios' => Convenio::all(),
            'responsables_empresa' => ResponsableEmpresa::all(),
        ]);
    }

    public function update(PasantiaUpdateRequest $request, Pasantia $pasantia)
    {
        $validated = $request->validated();

        // Actualizar datos principales
        $pasantia->update([
            'fecha_acta' => $validated['fecha_acta'],
            'fecha_inicio' => $validated['fecha_inicio'],
            'duracion' => $validated['duracion'],
            'fecha_fin' => $validated['fecha_fin'],
            'monto' => $validated['monto'],
            'domicilio' => $validated['domicilio'],
            'tareas' => $validated['tareas'],
            'alumno_carrera_id' => $validated['alumno_carrera_id'],
            'docente_id' => $validated['docente_id'],
            'responsable_empresa_id' => $validated['responsable_empresa_id'],
            'convenio_id' => $validated['convenio_id'],
        ]);

        return redirect()->route('pasantias.index')
            ->with('success', 'Pasantia actualizada correctamente.');
    }

    public function destroy(Pasantia $pasantia)
    {
        $pasantia->delete();
        return redirect()->route('pasantias.index')
            ->with('success', 'Pasantia eliminada correctamente.');
    }

    public function show(Pasantia $pasantia)
    {
        return Inertia::render('pasantias/show', [
            'pasantia' => $pasantia->load([
                'fecha_acta', 
                'fecha_inicio',
                'duracion',
                'fecha_fin',
                'monto',
                'domicilio',
                'tareas',
                'alumno_carrera_id', 
                'docente_id', 
                'convenio_id', 
                'responsable_empresa_id'
            ]),
        ]);
    }
}