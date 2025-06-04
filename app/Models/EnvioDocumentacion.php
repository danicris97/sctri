<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvioDocumentacion extends Model
{
    use HasFactory;

    protected $table = 'envios_documentacion';

    protected $fillable = [
        'control_documentacion_id',
        'numero_de_nota',
        'fecha_envio',
        'fecha_recepcion',
        'fecha_devolucion',
        'dirigido_a',
        'observaciones',
    ];

    public function control_documentacion()
    {
        return $this->belongsTo(ControlDocumentacionPasantia::class, 'control_documentacion_id');
    }
}