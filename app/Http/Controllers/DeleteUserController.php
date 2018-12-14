<?php

namespace genericlothing\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use genericlothing\User;
use DB;
class DeleteUserController extends Controller
{
  public function __construct(){
       $this->middleware('auth');
  }

  public function deleteCliente(){
    $user = auth()->user();

    $user->estado = 1;

    $user->save();

    Auth::logout();

    return redirect()->route('guest');
  }
}
