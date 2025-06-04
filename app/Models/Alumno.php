<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombre',
        'apellido'
    ];

    public function carrera() {
        return $this->belongsToMany(Carrera::class, 'alumno_carrera')
                    ->withPivot('lu_alumno')
                    ->withTimestamps();
    }
}