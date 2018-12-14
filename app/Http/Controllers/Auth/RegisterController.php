<?php

namespace genericlothing\Http\Controllers\Auth;

use genericlothing\User;
use genericlothing\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use genericlothing\Ciudad;
use genericlothing\Pedido;
use genericlothing\TipoProducto;
use genericlothing\Marca;
use genericlothing\Talla;
use DB;
use Illuminate\Auth\Events\Registered;

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

     /**
      *
      * Override Trait RegistersUsers : vendor/laravel/framework/src/Illuminate/Foundation/Auth/RegistersUsers.php
      *
     */
     public function register(Request $request)
     {
         $aux_user = User::whereColumn([
                      ['rut_cliente', '=',  DB::raw('\''.$request->rut.'\'')],
                      ])->first();

         if ($aux_user != null) {
           if ($aux_user->estado == 1) {

             $aux_user->estado = 0;
             $aux_user->save();
             Auth::login($aux_user);

             return redirect('/home');

           }
         }

         $this->validator($request->all())->validate();

         event(new Registered($user = $this->create($request->all())));

         $this->guard()->login($user);

         return $this->registered($request, $user)
                         ?: redirect($this->redirectPath());
     }

    protected function validator(array $data)
    {

        $rut = array_get($data, 'rut');

        $user = User::whereColumn([
                     ['rut_cliente', '=',  DB::raw('\''.$rut.'\'')],
                     ])->first();

        if ($user != null && $user->estado == 1) {
          $user->nom_cliente = array_get($data, 'nombre');
          $user->apellido_paterno = array_get($data, 'apellido_paterno');
          $user->apellido_materno = array_get($data, 'apellido_materno');
          $user->telefono = array_get($data, 'telefono');
          $user->email = array_get($data, 'email');
          $user->cod_ciudad = array_get($data, 'ciudad');

          if ( array_get($data, 'password') != array_get($data, 'password_confirmation') ) {
            return Validator::make($data, [
                'password' => 'required|confirmed|min:6',
            ]);

          }else{

            $user->password = Hash::make($data['password']);

            $validator = Validator::make($data, [
                'email' => 'required|string|email|max:255|unique:cliente,email',
                'rut' => 'required|string|min:9|max:12|unique:cliente,rut_cliente',
                'password' => 'required|confirmed|min:6',
            ]);

            $user->save();
            return $validator;

          }

        }else{
          return Validator::make($data, [
              'email' => 'required|string|email|max:255|unique:cliente,email',
              'rut' => 'required|string|min:9|max:12|unique:cliente,rut_cliente',
              'password' => 'required|confirmed|min:6',
          ]);
        }
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
