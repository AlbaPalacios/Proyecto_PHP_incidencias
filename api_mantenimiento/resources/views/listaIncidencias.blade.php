@extends('layouts.app')

@section('content')
<script type="text/javascript">
  function borrarIncidencia() {
    return confirm('Estas seguro?');
  }
</script>
<div class="container">
  <h1>Lista de incidencias</h1>
  <div class="container">
    @if (Auth::user()->isAdmin == '1' || Auth::user()->esCliente == '1')
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='/incidencias/registrar'"
    >
      Crear incidencia
    </button>
    @endif
    
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">NIF/CIF</th>
        <th scope="col">Nombre Contacto</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Realizacion</th>
        <th scope="col">Operario</th>
        @if (Auth::user()->esCliente != '1')<th scope="col">Acciones</th>@endif
      </tr>
    </thead>
    <tbody>
      @foreach ($incidencias as $incidencia)
      <tr>
        <th scope="row">{{$incidencia->nif_cif}}</th>
        <td>{{$incidencia->nombre_contacto}}</td>
        <td>{{$incidencia->descripcion}}</td>
        @if ($incidencia->estado=='B')
        <td>Esperando</td>
        @elseif ($incidencia->estado=='P')
        <td>Pendiente</td>
        @elseif ($incidencia->estado=='R')
        <td>Realizada</td>
        @elseif ($incidencia->estado=='C')
        <td>Cancelada</td>
        @else
        <td>No Válido</td>
        @endif

        <td>{{$incidencia->fecha_realizacion}}</td>
        <td>@if ($incidencia->empleadoAsignado != null){{$incidencia->empleadoAsignado->nombre}}@else{{''}}@endif</td>
        <td>
          @if (Auth::user()->isAdmin == '1')
         
          <a
            type="button"
            href="/incidencias/editar/{{$incidencia->id_incidencia}}"
            class="btn btn-info">Editar
            </a>{{' '}} @endif
            @if (Auth::user()->esEmpleado == '1')
          <a
            type="button"
            href="/incidencias/cambiarEstado/{{$incidencia->id_incidencia}}"
            class="btn btn-warning">Cambiar estado</a
          >@endif{{' '}} 
          @if (Auth::user()->isAdmin == '1')
          <form onsubmit="return borrarIncidencia()" action="/incidencias/borrar/{{$incidencia->id_incidencia}}" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <button
            type="submit"
            class="btn btn-danger">Borrar</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
