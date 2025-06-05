<?php

namespace App\Http\Requests\Convenios;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // si añades políticas, aquí revisas el permiso. Por ahora:
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha_acta'                => 'required|date',
            'fecha_inicio'              => 'required|date',
            'duracion'                  => 'required|integer|min:1',
            'fecha_fin'                 => 'required|date|after:fecha_inicio',
            'monto'                     => 'required|numeric|min:0',
            'domicilio'                 => 'nullable|string',
            'tareas'                    => 'nullable|string',
            'alumno_carrera_id'         => 'required|exists:alumnos_carrera,id',
            'docente_id'                => 'required|exists:docentes,id',
            'responsable_empresa_id'    => 'nullable|exists:responasbles_empresa,id',
            'convenio_id'               => 'nullable|exists:convenios,id',
        ];
    }
}