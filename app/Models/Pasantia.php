<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasantia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_acta', 
        'fecha_inicio', 
        'duracion', 
        'fecha_fin',
        'monto', 
        'domicilio', 
        'tareas', 
        'alumno_carreras_id',
        'docente_id', 
        'convenio_id',
        'responsable_empresa_id'
    ];

    public function scopeFechaInicioBeforeFechaFin($query)
    {
        return $query->where('fecha_inicio', '<', 'fecha_fin');
    }

    public function alumno_carrera()
    {
        return $this->belongsTo(AlumnoCarrera::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class);
    }

    public function responsable_empresa()
    {
        return $this->belongsTo(ResponsableEmpresa::class);
    }

    public function bajas_pasantia()
    {
        return $this->hasMany(BajaPasantia::class);
    }

    public function renovaciones_pasantia()
    {
        return $this->hasMany(RenovacionPasantia::class);
    }

    public function control_pago_alumno()
    {
        return $this->hasMany(ControlPagoAlumno::class);
    }

    public function control_aporte_universidad()
    {
        return $this->hasMany(ControlAporteUniversidad::class);
    }

    public function control_documentacion_pasantia()
    {
        return $this->hasMany(ControlDocumentacionPasantia::class);
    }
}
