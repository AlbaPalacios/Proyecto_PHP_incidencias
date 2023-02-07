@extends('layout')

@section('content')

<div class="container">

    <h1> @if (isset($id_incidencia) == false) {{'Crear'}} @else {{'Editar'}} @endif incidencia</h1>

    <!-- Formulario -->
    <form method="POST" action="@if (isset($id_incidencia) == false) {{route('incidencias.registrar.get')}} @else {{route('incidencias.editar', ['id_incidencia' => $id_incidencia])}} @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- DNI/CIF -->
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI o CIF</label>
            <input type="text" value="@if (isset($incidencia->nif_cif) == false) {{''}} @else {{$incidencia->nif_cif}} @endif"
                class="form-control" id="nif_cif"
                name="nif_cif" placeholder="DNI o CIF">
            {{-- @if ($errores->nif_cif==true)
            @foreach ($error as $errores->nif_cif)
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Nombre contacto -->
        <div class="mb-3">
            <label class="form-label" for="nombre_contacto">Persona de contacto</label>
            <input type="text" value="@if (isset($incidencia->nombre_contacto) == false) {{''}} @else {{$incidencia->nombre_contacto}} @endif"
                class="form-contro"
                name="nombre_contacto" id="nombre_contacto" placeholder="Persona de contacto">
            {{-- @if ($errores->nombre_contacto==true)
            @foreach ($error as $errores->nombre_contacto)
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Telefono contacto -->
        <div class="mb-3">
            <label class="form-label" for="telefono_contacto">Telefono de contacto</label>
            <input type="text" value="@if (isset($incidencia->telefono_contacto) == false) {{''}} @else {{$incidencia->telefono_contacto}} @endif"
                class="form-control"
                name="telefono_contacto" id="telefono_contacto" placeholder="Telefono de contacto">
            {{-- @if ($errores->telefono_contacto==true)
            @foreach ($error as $errores->telefono_contacto)
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Descripcion -->
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripcion</label>
            <input type="text" value="@if (isset($incidencia->descripcion) == false) {{''}} @else {{$incidencia->descripcion}} @endif"
                class="form-control" name="descripcion"
                id="descripcion" placeholder="Persona de Descripcion">
            {{-- @if ($errores->descripcion==true)           
            @foreach ($error as $errores->descripcion)     
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email_contacto">Correo electronico</label>
            <input type="text" value="@if (isset($incidencia->email_contacto) == false) {{''}} @else {{$incidencia->email_contacto}} @endif"
                class="form-control" name="email_contacto" id="email_contacto"
                placeholder="Correo electronico">
            {{-- @if ($errores->email_contacto==true)

            @foreach ($error as $errores->email_contacto)
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Direccion -->
        <div class="mb-3">
            <label class="form-label" for="direccion">Direccion</label>
            <input type="text" value="@if (isset($incidencia->direccion) == false) {{''}} @else {{$incidencia->direccion}} @endif" class="form-control" name="direccion" id="direccion"
                placeholder="Direccion">
        </div>

        <!-- Poblacion -->
        <div class="mb-3">
            <label class="form-label" for="poblacion">Poblacion</label>
            <input type="text" value="@if (isset($incidencia->poblacion) == false) {{''}} @else {{$incidencia->poblacion}} @endif" class="form-control" name="poblacion" id="poblacion"
                placeholder="Poblacion">
        </div>

        <!-- Codigo postal -->
        <div class="mb-3">
            <label class="form-label" for="cp">Codigo postal</label>
            <input type="text" value="@if (isset($incidencia->cp) == false) {{''}} @else {{$incidencia->cp}} @endif"
            
                class="form-control" name="cp" id="cp"
                placeholder="Codigo postal">
           {{--  @if ($errores->cp =='true')
            @foreach ($error as $errores->cp)
            <div class="invalid-feedback">
                {{error}}
            </div>
            @endforeach
            @endif --}}
        </div>

        <!-- Provincia -->
        <div class="mb-3">
            <label class="form-label" for="provincia">Provincia</label>
            <input type="text" value="@if (isset($incidencia->provincia) == false) {{''}} @else {{$incidencia->provincia}} @endif" class="form-control" name="provincia" id="provincia"
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
            <input type="text" value="@if (isset($incidencia->fecha_realizacion) == false) {{''}} @else {{$incidencia->fecha_realizacion}} @endif" class="form-control" name="fecha_realizacion"
                id="fecha_realizacion" placeholder="Fecha realizacion">
        </div>

        <!-- Anotacion anterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_anterior">Anotaciones anteriores</label>
            <input type="text" value="@if (isset($incidencia->anotacion_anterior) == false) {{''}} @else {{$incidencia->anotacion_anterior}} @endif" class="form-control"
                name="anotacion_anterior" id="anotacion_anterior" placeholder="Anotaciones anteriores">
        </div>

        <!-- Posterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_posterior">Anotaciones posteriores</label>
            <input type="text" value="@if (isset($incidencia->anotacion_posterior) == false) {{''}} @else {{$incidencia->anotacion_posterior}} @endif" class="form-control"
                name="anotacion_posterior" id="anotacion_posterior" placeholder="Anotaciones posteriores">
        </div>
        
        <a type="button" href="/" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($id_incidencia) == false) {{'Crear'}}  @else {{'Editar'}} @endif tarea</button>
    </form>
</div>


@endsection