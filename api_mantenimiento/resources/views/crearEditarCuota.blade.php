@extends('layouts.app')

@section('content')

<div class="container">

    <h1> @if (isset($cuota) == false) {{'Crear'}} @else {{'Editar'}} @endif cuota</h1>

    <!-- Formulario -->
    <form method="POST" action="
    @if (isset($cuota) == false) 
     @if (isset($clientes))
     {{route('cuotas.registrar.post')}} 
     @else 
     {{route('cuotas.remesa.crearRemesaMensual.post')}} 
     @endif
    @else 
    {{route('cuotas.editar.post', ['id_cuota' => $cuota->id_cuota])}} 
    @endif">
        @csrf <!-- {{ csrf_field() }} -->

        <!-- Concepto -->
        <div class="mb-3">
            <label class="form-label" for="concepto">Concepto</label>
            <input type="text" value="@if (isset($cuota->concepto) == false) {{old('concepto')}} @else {{$cuota->concepto}} @endif"
                class="form-control" id="concepto"
                name="concepto" placeholder="Concepto">
                <div class="text-danger">
                    {{$errors->first('concepto')}}
                </div>
        </div>

        <!-- Importe -->
        <div class="mb-3">
            <label class="form-label" for="correo">Importe</label>
            <input type="text" value="@if (isset($cuota->importe) == false) {{old('importe')}} @else {{$cuota->importe}} @endif"
                class="form-control"
                name="importe" id="importe" placeholder="Importe">
                <div class="text-danger">
                    {{$errors->first('importe')}}
                </div>
        </div>

        <!-- Notas -->
        <div class="mb-3">
            <label class="form-label" for="correo">Notas</label>
            <input type="text" value="@if (isset($cuota->notas) == false) {{old('notas')}} @else {{$cuota->notas}} @endif"
                class="form-control"
                name="notas" id="notas" placeholder="Notas">
                <div class="text-danger">
                    {{$errors->first('notas')}}
                </div>
        </div>

        <!-- Cliente -->
        @if (isset($clientes))
            <div class="mb-3">
                <label class="form-label" for="cliente_id">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="custom-select custom-select-lg mb-3">
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id_cliente}}">{{$cliente->nombre}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        
        
        <a type="button" href="{{ route('cuotas') }}" class="btn btn-primary">Atras</a>
        <button type="submit" class="btn btn-primary">@if (isset($cuota) == false) {{'Crear'}}  @else {{'Editar'}} @endif Cuota</button>
    </form>
</div>


@endsection