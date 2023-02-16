@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Lista de empleados</h1>
  <div class="container">
    @if (Auth::user()->isAdmin)  
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='{{route('empleados.registrar.get')}}'"
    >
      Dar de alta empleado
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
        <th scope="col">Direccion</th>
        <th scope="col">Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($empleados as $empleado)
      <tr>
        <th scope="row">{{$empleado->dni}}</th>
        <td>{{$empleado->nombre}}</td>
        <td>{{$empleado->correo}}</td>
        <td>{{$empleado->telefono}}</td>
        <td>{{$empleado->direccion}}</td>
        @if ($empleado->usuarioEmpleado->isAdmin=='0')
        <td>Operario</td>
        @elseif ($empleado->usuarioEmpleado->isAdmin=='1')
        <td>Administrador</td>
        @endif
        
        <td><a
            type="button"
            href="{{route('empleados.editar.get', ['id_empleado' => $empleado->id_empleado])}}"
            class="btn btn-info">Editar
            </a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
