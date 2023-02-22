@extends('layouts.app')

@section('content')

<div class="container">

    <h1> @if (isset($cliente) == false) {{'Crear'}} @else {{'Editar'}} @endif cliente</h1>

    <!-- Formulario -->
    <form method="POST" action="@if (isset($cliente) == false) {{route('clientes.registrar.post')}} @else {{route('clientes.editar.post', ['id_cliente' => $cliente->id_cliente])}} @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- DNI -->
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI</label>
            <input type="text" value="@if (isset($cliente->dni) == false) {{old('dni')}} @else {{$cliente->dni}} @endif"
                class="form-control" id="dni"
                name="dni" placeholder="DNI">
                <div class="text-danger">
                    {{$errors->first('dni')}}
                </div>
        </div>

        <!-- Nombre -->
        <div class="mb-3">
            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" value="@if (isset($cliente->nombre) == false) {{old('nombre')}} @else {{$cliente->nombre}} @endif"
                class="form-control"
                name="nombre" id="nombre" placeholder="Nombre">
                <div class="text-danger">
                    {{$errors->first('nombre')}}
                </div>
        </div>

        <!-- Correo -->
        <div class="mb-3">
            <label class="form-label" for="correo">Correo</label>
            <input type="email" value="@if (isset($cliente->correo) == false) {{old('correo')}} @else {{$cliente->correo}} @endif"
                class="form-control"
                name="correo" id="correo" placeholder="Correo">
                <div class="text-danger">
                    {{$errors->first('correo')}}
                </div>
        </div>

        <!-- Telefono -->
        <div class="mb-3">
            <label class="form-label" for="telefono">Telefono de contacto</label>
            <input type="text" value="@if (isset($cliente->telefono) == false) {{old('telefono')}} @else {{$cliente->telefono}} @endif"
                class="form-control"
                name="telefono" id="telefono" placeholder="Telefono de contacto">
                <div class="text-danger">
                    {{$errors->first('telefono')}}
                </div>
        </div>

        <!-- Numero de cuenta -->
        <div class="mb-3">
            <label class="form-label" for="direccion">Numero de cuenta</label>
            <input type="text" value="@if (isset($cliente->numero_cuenta) == false) {{old('numero_cuenta')}} @else {{$cliente->numero_cuenta}} @endif" class="form-control" name="numero_cuenta" id="numero_cuenta"
                placeholder="Numero de cuenta">
        </div>

        <!-- Pais -->
        <div class="mb-3">
            <label class="form-label" for="pais">Pais</label>
            <input type="text" value="@if (isset($cliente->pais) == false) {{old('pais')}} @else {{$cliente->pais}} @endif" class="form-control" name="pais" id="pais"
                placeholder="Pais">
        </div>  

        <!-- Moneda -->
        <div class="mb-3">
            <label class="form-label" for="moneda">Moneda</label>
            <input type="text" value="@if (isset($cliente->moneda) == false) {{old('moneda')}} @else {{$cliente->moneda}} @endif" class="form-control" name="moneda" id="moneda"
                placeholder="Moneda">
        </div>  

        <!-- Cuota mensual -->
        <div class="mb-3">
            <label class="form-label" for="moneda">Importe cuota mensual</label>
            <input type="text" value="@if (isset($cliente->importe_cuota_mensual) == false) {{old('importe_cuota_mensual')}} @else {{$cliente->importe_cuota_mensual}} @endif" class="form-control" name="importe_cuota_mensual" id="importe_cuota_mensual"
                placeholder="Importe cuota mensual">
        </div>  
        
        <a type="button" href="{{ route('clientes') }}" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($cliente) == false) {{'Crear'}}  @else {{'Editar'}} @endif Cliente</button>
    </form>
</div>


@endsection