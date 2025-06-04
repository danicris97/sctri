<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'rol'
    ];

    public function pasantias()
    {
        return $this->hasMany(Pasantia::class);
    }

}