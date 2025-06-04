<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecaFormacion extends Model
{
    use HasFactory;

    protected $table = 'becas_de_formacion';

    protected $fillable = [
        'alumno_carrera_id',
        'responsable_becario_id',
        'fecha_inicio',
        'duracion',
        'estado',
        'dependencia',
        'observaciones',
    ];

    public function alumno_carrera()
    {
        return $this->belongsTo(AlumnoCarrera::class);
    }

    public function responsable_becario()
    {
        return $this->belongsTo(ResponsableBecaFormacion::class);
    }
}