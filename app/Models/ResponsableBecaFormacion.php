<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableBecaFormacion extends Model
{
    use HasFactory;

    protected $table = 'responsables_becario';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'cargo',
        'dependencia',
    ];

    public function beca_de_formacion()
    {
        return $this->hasMany(BecaFormacion::class);
    }
}