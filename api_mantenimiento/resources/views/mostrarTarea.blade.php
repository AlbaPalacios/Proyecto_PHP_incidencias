@extends('layout')

@section('content')
<div class="container">
    <h1>Tarea {{$incidencia->id_incidencia}}</h1>

    <form method="POST" action="/cambiarEstado/{{$incidencia->id_incidencia}}">
        <div class="mb-3">
            <label class="form-label" for="nif_cif">DNI o CIF</label>
            <p id="nif_cif">{{$incidencia->nif_cif}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nombre_contacto">Persona de contacto</label>
            <p id="nombre_contacto">{{$incidencia->nombre_contacto}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefono_contacto">Telefono de contacto</label>
            <p id="telefono_contacto">{{$incidencia->telefono_contacto}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripcion</label>
            <p id="descripcion">{{$incidencia->descripcion}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email_contacto">Correo electronico</label>
            <p id="email_contacto">{{$incidencia->email_contacto}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="direccion">Direccion</label>
            <p id="direccion">{{$incidencia->direccion}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="poblacion">Poblacion</label>
            <p id="poblacion">{{$incidencia->poblacion}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="cp">Codigo postal</label>
            <p id="cp">{{$incidencia->cp}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="provincia">Provincia</label>
            <p id="provincia">{{$incidencia->provincia}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="estado">Estado</label>
            <p id="estado">
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
            </p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="id_operario">Operario encargado</label>
            <p id="id_operario">{{$incidencia->operario}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="fecha_creacion">Fecha realizacion</label>
            <p id="fecha_creacion">{{$incidencia->fecha_creacion}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="fecha_realizacion">Fecha realizacion</label>
            <p id="fecha_realizacion">{{$incidencia->fecha_realizacion}}</p>
        </div>
        <div class="mb-3">
            <label class="form-label" for="anotacion_anterior">Anotaciones anteriores</label>
            <input type="text" value="{{$incidencia->anotacion_anterior}}" class="form-control" name="anotacion_anterior"
                id="anotacion_anterior" placeholder="Anotaciones posteriores">
        </div>
        <div class="mb-3">
            <label class="form-label" for="anotacion_posterior">Anotaciones posteriores</label>
            <input type="text" value="{{$incidencia->anotacion_posterior}}" class="form-control" name="anotacion_posterior"
                id="anotacion_posterior" placeholder="Anotaciones posteriores">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cambiar_estado">Anotaciones posteriores</label>
            <select id="cambiar_estado" name="cambiar_estado" class="custom-select custom-select-lg mb-3">
                <option  @if ($incidencia->estado=='B')selected @endif value="B">Esperando</option>
                <option  @if ($incidencia->estado=='P')selected @endif value="P">Pendiente</option>
                <option  @if ($incidencia->estado=='R')selected @endif value="R">Realizada</option>
                <option  @if ($incidencia->estado=='C')selected @endif value="C">Cancelada</option>
              </select>
        </div>
        
          <a type="button" href="/" class="btn btn-primary">Volver</a>
        <button type="submit" class="btn btn-primary">Cambiar estado</button>
    </form>
</div>


@endsection