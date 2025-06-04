<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajaBecaFormacion extends Model
{
    use HasFactory;

    protected $table = 'bajas_becas_de_formacion';

    protected $fillable = [
        'beca_de_formacion_id',
        'fecha_baja',
        'motivo',
        'observaciones',
    ];

    public function beca_de_formacion()
    {
        return $this->belongsTo(BecaDeFormacion::class);
    }
}