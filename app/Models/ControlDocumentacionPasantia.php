<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDocumentacionPasantia extends Model
{
    use HasFactory;

    protected $table = 'controles_documentacion_pasantia';

    protected $fillable = [
        'pasantia_id',
        'fecha_firma_secretaria',
        'observaciones',
    ];

    public function pasantia()
    {
        return $this->belongsTo(Pasantia::class);
    }

    public function envio_documentaciones()
    {
        return $this->hasMany(EnvioDocumentacion::class);
    }

    public function acta_pasantias()
    {
        return $this->hasMany(ActaPasantia::class);
    }
}