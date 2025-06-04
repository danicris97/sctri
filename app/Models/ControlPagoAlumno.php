<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPagoAlumno extends Model
{
    use HasFactory;

    protected $table = 'controles_pagos_alumnos';

    protected $fillable = ['pasantia_id', 'periodo', 'monto_estimulo', 'monto_recibo_de_sueldo', 'monto_deposito'];

    public function pasantia()
    {
        return $this->belongsTo(Pasantia::class);
    }
}