<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajaPasantia extends Model
{
    use HasFactory;

    protected $table = 'bajas_pasantia';

    protected $fillable = [
        'fecha_baja',
        'motivo',
        'pasantia_id'
    ];

    public function pasantia()
    {
        return $this->belongsTo(Pasantia::class);
    }
}