@extends('Layouts.app')
@section('title')
@section('content')
  <span>Hola {{auth()->user()->nom_cliente}}, bienvenido </span>
  <form class="form-group" action="{{route('logout')}}" method="post">
    @csrf
    <button class="btn btn-danger btn-block"type="sumbit" name="button">Cerrar sesion</button>
  </form>
@endsection
