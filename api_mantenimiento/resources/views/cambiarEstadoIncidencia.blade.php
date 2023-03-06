@extends('layouts.app')

@section('content')

<div class="container">

    <h1> Cambiar estado de incidencia</h1>

    <!-- Formulario -->
    <form method="POST" action="{{route('incidencias.cambiarEstado.post',  ['id_incidencia' => $incidencia->id_incidencia])}}">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- Estado -->
        <div class="mb-3">
            <label class="form-label" for="estado">Estado</label>
            <select id="estado" name="estado" class="custom-select custom-select-lg mb-3">
                <option @if (isset($incidencia->estado) == true && $incidencia->estado == 'B') {{'selected'}} @endif value="B">Esperando</option>
                <option @if (isset($incidencia->nif_cif) == true && $incidencia->estado == 'P') {{'selected'}} @endif value="P">Pendiente</option>
                <option @if (isset($incidencia->nif_cif) == true && $incidencia->estado == 'R') {{'selected'}} @endif value="R">Realizada</option>
                <option @if (isset($incidencia->nif_cif) == true && $incidencia->estado == 'C') {{'selected'}} @endif value="C">Cancelada</option>
              </select>
        </div>     
        
        <!-- Fecha realizacion -->
        <div class="mb-3">
            <label class="form-label" for="fecha_realizacion">Fecha realizacion</label>
            <input type="text" value="@if (isset($incidencia->fecha_realizacion) == false) {{old('fecha_realizacion')}} @else {{$incidencia->fecha_realizacion}} @endif" class="form-control" name="fecha_realizacion"
                id="fecha_realizacion" placeholder="Fecha realizacion">
        </div>

        <!-- Anotacion anterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_anterior">Anotaciones anteriores</label>
            <input type="text" value="@if (isset($incidencia->anotacion_anterior) == false) {{old('anotacion_anterior')}} @else {{$incidencia->anotacion_anterior}} @endif" class="form-control"
                name="anotacion_anterior" id="anotacion_anterior" placeholder="Anotaciones anteriores">
        </div>

        <!-- Anotacion Posterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_posterior">Anotaciones posteriores</label>
            <input type="text" value="@if (isset($incidencia->anotacion_posterior) == false) {{old('anotacion_posterior')}} @else {{$incidencia->anotacion_posterior}} @endif" class="form-control"
                name="anotacion_posterior" id="anotacion_posterior" placeholder="Anotaciones posteriores">
        </div>

        <a type="button" href="/incidencias" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">Cambiar estado de la incidencia</button>
    </form>
</div>


@endsection