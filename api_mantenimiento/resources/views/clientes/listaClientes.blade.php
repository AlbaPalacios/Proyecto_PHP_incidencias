@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Lista de clientes</h1>
  <div class="container">
    @if (Auth::user() !== null && Auth::user()->isAdmin)  
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='{{route('clientes.registrar.get')}}'"
    >
      Dar de alta cliente
    </button>
    @endif
    
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">DNI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Numero de cuenta</th>
        <th scope="col">Pais</th>
        <th scope="col">Moneda</th>
        <th scope="col">Cuota mensual</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clientes as $cliente)
      <tr>
        <th scope="row">{{$cliente->dni}}</th>
        <td>{{$cliente->nombre}}</td>
        <td>{{$cliente->correo}}</td>
        <td>{{$cliente->telefono}}</td>
        <td>{{$cliente->numero_cuenta}}</td>
        <td>{{$cliente->pais}}</td>
        <td>{{$cliente->moneda}}</td>
        <td>{{$cliente->importe_cuota_mensual}}</td>


        <td><a
            type="button"
            href="{{route('clientes.editar.get', ['id_cliente' => $cliente->id_cliente])}}"
            class="btn btn-info">Editar
            </a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
