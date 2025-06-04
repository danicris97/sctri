<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenovacionPasantia extends Model
{   
    use HasFactory;

    protected $table = 'renovaciones_pasantia';

    protected $fillable = [
        'fecha_renovacion',
        'pasantia_id',
        'duracion',
    ];

    public function pasantia()
    {
        return $this->belongsTo(Pasantia::class);
    }
}