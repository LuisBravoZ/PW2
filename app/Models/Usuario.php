<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;
use App\Models\Turno;
use App\Models\DatoPersonal;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

protected $table='usuario';
protected $fillable=[
    'rol_id','usuario_id',
    'nombre','email','password'];



public function rol(){
    return $this->belongsTo(Rol::class,'rol_id');
}

public function datopersonal(){
    return $this->hasOne(DatoPersonal::class,'dato_personal_id');
}
  
                   
    public function turnos()
{
    return $this->morphMany(Turno::class, 'turnable');
}
}
