<?php

namespace genericlothing\Http\Controllers\Auth;

use genericlothing\User;
use genericlothing\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use genericlothing\Ciudad;
use genericlothing\Pedido;
use genericlothing\TipoProducto;
use genericlothing\Marca;
use genericlothing\Talla;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showRegistrationForm']);
    }

    public function showRegistrationForm(){
        $Ciudades = Ciudad::all();
        $Tallas = Talla::all();
        $TipoProductos = TipoProducto::all();
        $Marcas = Marca::all();

        return view('Auth.register',compact('Ciudades','TipoProductos','Marcas','Tallas'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:cliente,email',
            'rut' => 'required|string|min:9|max:12|unique:cliente,rut_cliente',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \genericlothing\User
     */
    protected function create(array $data){
        $User = User::create([
            'nom_cliente' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'rut_cliente' => $data['rut'],
            'cod_ciudad' => $data['ciudad'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'estado' => '0',
        ]);
        Pedido::create([
            'rut_cliente' => $data['rut'],
            'fecha' => date('Y-m-d G:i:s'),
            'total' => '0',
            'estado' => '0',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s'),
        ]);


        return $User;
    }
}
