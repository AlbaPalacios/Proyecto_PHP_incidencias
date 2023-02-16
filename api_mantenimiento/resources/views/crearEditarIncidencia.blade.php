@extends('layout')

@section('content')

<div class="container">

    <h1> @if (isset($id_incidencia) == false) {{'Crear'}} @else {{'Editar'}} @endif incidencia</h1>

    <!-- Formulario -->
    <form method="POST" action="@if (isset($id_incidencia) == false) {{route('incidencias.registrar.post')}} @else {{route('incidencias.editar.post', ['id_incidencia' => $id_incidencia])}} @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- DNI/CIF -->
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI o CIF</label>
            <input type="text" value="@if (isset($incidencia->nif_cif) == false) {{old('nif_cif')}} @else {{$incidencia->nif_cif}} @endif"
                class="form-control" id="nif_cif"
                name="nif_cif" placeholder="DNI o CIF">
                <div class="text-danger">
                    {{$errors->first('nif_cif')}}
                </div>
        </div>

        <!-- Nombre contacto -->
        <div class="mb-3">
            <label class="form-label" for="apellido_contacto">Nombre de contacto</label>
            <input type="text" value="@if (isset($incidencia->nombre_contacto) == false) {{old('nombre_contacto')}} @else {{$incidencia->apellido_contacto}} @endif"
                class="form-control"
                name="apellido_contacto" id="apellido_contacto" placeholder="Persona de contacto">
                <div class="text-danger">
                    {{$errors->first('apellido_contacto')}}
                </div>
        </div>

        <!-- Apellido contacto -->
        <div class="mb-3">
            <label class="form-label" for="apellido_contacto">Apellidos del contacto</label>
            <input type="text" value="@if (isset($incidencia->apellido_contacto) == false) {{old('apellido_contacto')}} @else {{$incidencia->nombre_contacto}} @endif"
                class="form-control"
                name="nombre_contacto" id="nombre_contacto" placeholder="Persona de contacto">
                <div class="text-danger">
                    {{$errors->first('nombre_contacto')}}
                </div>
        </div>

        <!-- Telefono contacto -->
        <div class="mb-3">
            <label class="form-label" for="telefono_contacto">Telefono de contacto</label>
            <input type="text" value="@if (isset($incidencia->telefono_contacto) == false) {{old('telefono_contacto')}} @else {{$incidencia->telefono_contacto}} @endif"
                class="form-control"
                name="telefono_contacto" id="telefono_contacto" placeholder="Telefono de contacto">
                <div class="text-danger">
                    {{$errors->first('telefono_contacto')}}
                </div>
        </div>

        <!-- Descripcion -->
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripcion</label>
            <input type="text" value="@if (isset($incidencia->descripcion) == false) {{old('descripcion')}} @else {{$incidencia->descripcion}} @endif"
                class="form-control" name="descripcion"
                id="descripcion" placeholder="Persona de Descripcion">
                <div class="text-danger">
                    {{$errors->first('descripcion')}}
                </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email_contacto">Correo electronico</label>
            <input type="text" value="@if (isset($incidencia->email_contacto) == false) {{old('email_contacto')}} @else {{$incidencia->email_contacto}} @endif"
                class="form-control" name="email_contacto" id="email_contacto"
                placeholder="Correo electronico">
                <div class="text-danger">
                    {{$errors->first('email_contacto')}}
                </div>
        </div>

        <!-- Direccion -->
        <div class="mb-3">
            <label class="form-label" for="direccion">Direccion</label>
            <input type="text" value="@if (isset($incidencia->direccion) == false) {{old('direccion')}} @else {{$incidencia->direccion}} @endif" class="form-control" name="direccion" id="direccion"
                placeholder="Direccion">
        </div>

        <!-- Poblacion -->
        <div class="mb-3">
            <label class="form-label" for="poblacion">Poblacion</label>
            <input type="text" value="@if (isset($incidencia->poblacion) == false) {{old('poblacion')}} @else {{$incidencia->poblacion}} @endif" class="form-control" name="poblacion" id="poblacion"
                placeholder="Poblacion">
        </div>

        <!-- Codigo postal -->
        <div class="mb-3">
            <label class="form-label" for="cp">Codigo postal</label>
            <input type="text" value="@if (isset($incidencia->cp) == false) {{old('cp')}} @else {{$incidencia->cp}} @endif"
            
                class="form-control" name="cp" id="cp"
                placeholder="Codigo postal">
                <div class="text-danger">
                    {{$errors->first('cp')}}
                </div>
        </div>

        <!-- Provincia -->
        <div class="mb-3">
            <label class="form-label" for="provincia">Provincia</label>
            <input type="text" value="@if (isset($incidencia->provincia) == false) {{old('provincia')}} @else {{$incidencia->provincia}} @endif" class="form-control" name="provincia" id="provincia"
                placeholder="Provincia">
        </div>

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
        {{-- <div class="mb-3">
            <label class="form-label" for="id_operario">Operario encargado</label>
            <select id="id_operario" name="id_operario" class="custom-select custom-select-lg mb-3">
                @foreach ($operario as $operarios)
                
                <option @if ($tarea->estado == operario->id_usuario) selected  @endif value="{{operario->id_usuario}}">{{operario->nombre}}</option>
                @endforeach
              </select>
        </div> --}}

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

        <!-- Posterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_posterior">Anotaciones posteriores</label>
            <input type="text" value="@if (isset($incidencia->anotacion_posterior) == false) {{old('anotacion_posterior')}} @else {{$incidencia->anotacion_posterior}} @endif" class="form-control"
                name="anotacion_posterior" id="anotacion_posterior" placeholder="Anotaciones posteriores">
        </div>

        <a type="button" href="/" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($id_incidencia) == false) {{'Crear'}}  @else {{'Editar'}} @endif tarea</button>
    </form>
</div>


@endsection