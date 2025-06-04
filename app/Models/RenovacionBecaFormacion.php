<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenovacionBecaFormacion extends Model
{
    use HasFactory;

    protected $table = 'renovaciones_becas_de_formacion';

    protected $fillable = [
        'beca_de_formacion_id',
        'fecha_renovacion',
        'duracion',
    ];

    public function beca_de_formacion()
    {
        return $this->belongsTo(BecaFormacion::class);
    }
}