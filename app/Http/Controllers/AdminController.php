<?php

namespace genericlothing\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permisos');
    }
    public function index(){
      return view('Admin.index');
    }

    public function producto(){
      return redirect()->route('producto');
    }
}
