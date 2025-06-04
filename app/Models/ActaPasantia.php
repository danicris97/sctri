<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaPasantia extends Model
{
    use HasFactory;

    protected $table = 'actas_pasantias';

    protected $fillable = [
        'control_documentacion_id',
        'numero_de_pase',
        'fecha_pase',
        'tramite',
        'observaciones',
    ];

    public function control_documentacion()
    {
        return $this->belongsTo(ControlDocumentacionPasantia::class, 'control_documentacion_id');
    }
}