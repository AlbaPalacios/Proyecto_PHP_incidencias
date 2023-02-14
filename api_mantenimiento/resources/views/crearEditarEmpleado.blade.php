@extends('layout')

@section('content')

<div class="container">

    <h1> @if (isset($id_empleado) == false) {{'Crear'}} @else {{'Editar'}} @endif empleado</h1>

    <!-- Formulario -->
    <form method="POST" action="@if (isset($id_empleado) == false) {{route('empleados.registrar.post')}} @else {{route('empleados.editar.get', ['id_empleado' => $id_empleado])}} @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- DNI/CIF -->
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI o CIF</label>
            <input type="text" value="@if (isset($empleado->nif_cif) == false) {{old('nif_cif')}} @else {{$empleado->nif_cif}} @endif"
                class="form-control" id="nif_cif"
                name="nif_cif" placeholder="DNI o CIF">
                <div class="text-danger">
                    {{$errors->first('nif_cif')}}
                </div>
        </div>

        <!-- Nombre contacto -->
        <div class="mb-3">
            <label class="form-label" for="apellido_contacto">Nombre de contacto</label>
            <input type="text" value="@if (isset($empleado->nombre_contacto) == false) {{old('nombre_contacto')}} @else {{$empleado->apellido_contacto}} @endif"
                class="form-control"
                name="apellido_contacto" id="apellido_contacto" placeholder="Persona de contacto">
                <div class="text-danger">
                    {{$errors->first('apellido_contacto')}}
                </div>
        </div>

        <!-- Apellido contacto -->
        <div class="mb-3">
            <label class="form-label" for="apellido_contacto">Apellidos del contacto</label>
            <input type="text" value="@if (isset($empleado->apellido_contacto) == false) {{old('apellido_contacto')}} @else {{$empleado->nombre_contacto}} @endif"
                class="form-control"
                name="nombre_contacto" id="nombre_contacto" placeholder="Persona de contacto">
                <div class="text-danger">
                    {{$errors->first('nombre_contacto')}}
                </div>
        </div>

        <!-- Telefono contacto -->
        <div class="mb-3">
            <label class="form-label" for="telefono_contacto">Telefono de contacto</label>
            <input type="text" value="@if (isset($empleado->telefono_contacto) == false) {{old('telefono_contacto')}} @else {{$empleado->telefono_contacto}} @endif"
                class="form-control"
                name="telefono_contacto" id="telefono_contacto" placeholder="Telefono de contacto">
                <div class="text-danger">
                    {{$errors->first('telefono_contacto')}}
                </div>
        </div>

        <!-- Descripcion -->
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripcion</label>
            <input type="text" value="@if (isset($empleado->descripcion) == false) {{old('descripcion')}} @else {{$empleado->descripcion}} @endif"
                class="form-control" name="descripcion"
                id="descripcion" placeholder="Persona de Descripcion">
                <div class="text-danger">
                    {{$errors->first('descripcion')}}
                </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email_contacto">Correo electronico</label>
            <input type="text" value="@if (isset($empleado->email_contacto) == false) {{old('email_contacto')}} @else {{$empleado->email_contacto}} @endif"
                class="form-control" name="email_contacto" id="email_contacto"
                placeholder="Correo electronico">
                <div class="text-danger">
                    {{$errors->first('email_contacto')}}
                </div>
        </div>

        <!-- Direccion -->
        <div class="mb-3">
            <label class="form-label" for="direccion">Direccion</label>
            <input type="text" value="@if (isset($empleado->direccion) == false) {{old('direccion')}} @else {{$empleado->direccion}} @endif" class="form-control" name="direccion" id="direccion"
                placeholder="Direccion">
        </div>
         <!-- Tipo -->
         <div class="mb-3">
            <label class="form-label" for="direccion">Cargo:</label>
            <select name="tipo" id="tipo">
                <option value="admin" {{ old('tipo') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="ope" {{ old('tipo') == 'ope' ? 'selected' : '' }}>Operario</option>

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
            <input type="text" value="@if (isset($empleado->fecha_realizacion) == false) {{old('fecha_realizacion')}} @else {{$empleado->fecha_realizacion}} @endif" class="form-control" name="fecha_realizacion"
                id="fecha_realizacion" placeholder="Fecha realizacion">
        </div>

        <!-- Anotacion anterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_anterior">Anotaciones anteriores</label>
            <input type="text" value="@if (isset($empleado->anotacion_anterior) == false) {{old('anotacion_anterior')}} @else {{$empleado->anotacion_anterior}} @endif" class="form-control"
                name="anotacion_anterior" id="anotacion_anterior" placeholder="Anotaciones anteriores">
        </div>

        <!-- Posterior -->
        <div class="mb-3">
            <label class="form-label" for="anotacion_posterior">Anotaciones posteriores</label>
            <input type="text" value="@if (isset($empleado->anotacion_posterior) == false) {{old('anotacion_posterior')}} @else {{$empleado->anotacion_posterior}} @endif" class="form-control"
                name="anotacion_posterior" id="anotacion_posterior" placeholder="Anotaciones posteriores">
        </div>

        <a type="button" href="/" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($id_empleado) == false) {{'Crear'}}  @else {{'Editar'}} @endif tarea</button>
    </form>
</div>


@endsection