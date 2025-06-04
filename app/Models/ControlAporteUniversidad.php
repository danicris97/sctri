<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlAporteUniversidad extends Model
{
    use HasFactory;

    protected $table = 'controles_aportes_universidad';

    protected $fillable = [
        'pasantia_id',
        'periodo',
        'monto_aporte',
        'fecha_pago_tesoreria',
        'expediente_tesoreria_id',
    ];

    public function pasantia()
    {
        return $this->belongsTo(Pasantia::class);
    }
}