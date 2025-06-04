<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableEmpresa extends Model
{
    use HasFactory;

    protected $table = "responsables_empresa";

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'area',
        'telefono',
        'celular',
        'email',
    ];

    public function pasantias(){
        return $this->hasMany(Pasantia::class);
    }
}