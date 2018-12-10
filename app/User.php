<?php

namespace genericlothing;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
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
    protected $keyType = 'string';
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

    public function getCodPedido($rut_cliente){
      return DB::table('pedido')
             ->select('cod_pedido')
             ->where('rut_cliente', '=', DB::raw('\''.$rut_cliente.'\''))->value('cod_pedido');
    }

    public function detallePedidoEmpty($rut_cliente){
      $boolean = TRUE;

      $cod_pedido = DB::table('pedido')
             ->select('cod_pedido')
             ->where('rut_cliente', '=', DB::raw('\''.$rut_cliente.'\''))->value('cod_pedido');

      $cant = DB::table('detalle-pedido')
                    ->select(DB::raw('count(*) as cant'))
                    ->where('cod_pedido', '=', DB::raw('\''.$cod_pedido.'\''))->value('cant');

      if ($cant == 0) {
        return true;
      }else {
        return false;
      }
    }
}
