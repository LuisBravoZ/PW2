<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    
    protected $table='turno';

    protected $fillable=[

        'estado_id',
        'paciente_id',
        'nutricionista_id',
        'fecha',
        'hora'
    ];

    public function atencion(){
        return $this->hasMany(Atencion::class,'atencion_id');
    }

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }

    public function usuario(){
        return $this->hasMany(Usuario::class,'usuario_id');
    }


    public function turnable()
{
    return $this->morphTo();
}

public function setTurnableAttribute($value)
{
    if (!in_array($value->nombre_rol, ['paciente', 'nutricionista'])) {
        throw new \Exception('El usuario asociado debe ser paciente o nutricionista');
    }

    parent::setTurnableAttribute($value);
}
}
