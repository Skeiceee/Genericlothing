<?php

namespace genericlothing;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Cliente";
    protected $primaryKey = "rut_cliente";
    public $timestamps = false;
    protected $fillable = [
        'rut_cliente', 'nom_cliente', 'apellido_paterno', 'apellido_materno',
        'telefono', 'cod_ciudad', 'email', 'password', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
