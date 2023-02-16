@extends('layouts.app')

@section('content')

<div class="container">

    <h1> @if (isset($empleado) == false) {{'Crear'}} @else {{'Editar'}} @endif empleado</h1>

    <!-- Formulario -->
    <form method="POST" action="@if (isset($empleado) == false) {{route('empleados.registrar.post')}} @else {{route('empleados.editar.post', ['id_empleado' => $empleado->id_empleado])}} @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- DNI -->
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI</label>
            <input type="text" value="@if (isset($empleado->dni) == false) {{old('dni')}} @else {{$empleado->dni}} @endif"
                class="form-control" id="dni"
                name="dni" placeholder="DNI">
                <div class="text-danger">
                    {{$errors->first('dni')}}
                </div>
        </div>

        <!-- Nombre -->
        <div class="mb-3">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" value="@if (isset($empleado->nombre) == false) {{old('nombre')}} @else {{$empleado->nombre}} @endif"
                class="form-control"
                name="nombre" id="nombre" placeholder="Nombre">
                <div class="text-danger">
                    {{$errors->first('nombre')}}
                </div>
        </div>

        <!-- Correo -->
        <div class="mb-3">
            <label class="form-label" for="correo">Correo</label>
            <input type="email" value="@if (isset($empleado->correo) == false) {{old('correo')}} @else {{$empleado->correo}} @endif"
                class="form-control"
                name="correo" id="correo" placeholder="Correo">
                <div class="text-danger">
                    {{$errors->first('correo')}}
                </div>
        </div>

        <!-- Telefono -->
        <div class="mb-3">
            <label class="form-label" for="telefono">Telefono de contacto</label>
            <input type="text" value="@if (isset($empleado->telefono) == false) {{old('telefono')}} @else {{$empleado->telefono}} @endif"
                class="form-control"
                name="telefono" id="telefono" placeholder="Telefono de contacto">
                <div class="text-danger">
                    {{$errors->first('telefono')}}
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
            <select id="tipo" name="tipo" class="custom-select custom-select-lg mb-3">
                <option value="0">Operario</option>
                <option value="1">Administrador</option>
              </select>
        </div>  
        
        <a type="button" href="{{ route('empleados') }}" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($empleado) == false) {{'Crear'}}  @else {{'Editar'}} @endif Empleado</button>
    </form>
</div>


@endsection