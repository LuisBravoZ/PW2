<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $table='atencion';
    
    protected $fillable=[
        'turno_id',
        'altura',
        'peso',
        'cintura',
        'cadena',
        'circunferencia_muneca',
        'circunferencia_cuello',
        'actividad_fisica',
        'imc',
        'tmb',
        'cintura_talla',
        'cintura_cadera',
        'porcetaje_grasa',
        'complexion_hueso'

    ];

    public function turno(){
        return $this->belongsTo(Turno::class,'turno_id');
    }

}
