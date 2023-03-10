@extends('layouts.app')

@section('content')
<script type="text/javascript">
  function borrarCuota() {
    return confirm('Estas seguro?');
  }
</script>
<div class="container">
  <h1>Lista de cuotas</h1>
  {{-- muestra este boton si solo es admin --}}
  <div class="container">
    @if (Auth::user() !== null && Auth::user()->isAdmin)  
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='{{route('cuotas.remesa.crearRemesaMensual.get')}}'"
    >
      Añadir remesa mensual
    </button>
    @endif
      {{-- muestra este boton si solo es admin --}}
    @if (Auth::user() !== null && Auth::user()->isAdmin)  
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='{{route('cuotas.registrar.get')}}'"
    >
      Añadir cuota excepcional
    </button>
    @endif
    
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Concepto</th>
        <th scope="col">Fecha</th>
        <th scope="col">Importe</th>
        <th scope="col">Notas</th>
        <th scope="col">Cliente</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cuotas as $cuota)
      <tr>
        <th scope="row">{{$cuota->id_cuota}}</th>
        <td>{{$cuota->concepto}}</td>
        <td>{{$cuota->fecha_emision}}</td>
        <td>{{$cuota->importe}}</td>
        <td>{{$cuota->notas}}</td>
        <td>{{$cuota->clienteCuota->nombre}}</td>


        <td><a
            type="button"
            href="{{route('cuotas.editar.get', ['id_cuota' => $cuota->id_cuota])}}"
            class="btn btn-info">Editar
            </a>{{' '}}<a
            type="button"
            href="{{route('cuotas.pdf', ['id_cuota' => $cuota->id_cuota])}}"
            class="btn btn-info">PDF
            </a><form onsubmit="return borrarCuota()" action="/cuotas/borrar/{{$cuota->id_cuota}}" method="POST">
              @csrf <!-- {{ csrf_field() }} -->
              <button
              type="submit"
              class="btn btn-danger">Borrar</button>
            </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
