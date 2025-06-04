<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    use HasFactory;

    protected $table = 'carreras';

    protected $fillable = [
        'nombre', 
        'facultad_id'
    ];

    public function facultad() {
        return $this->belongsTo(Facultad::class);
    }

    public function alumno(){
        return $this->belongsToMany(Alumno::class, 'alumno_carrera')
                    ->withPivot('lu_alumno')
                    ->withTimestamps();
    }
}