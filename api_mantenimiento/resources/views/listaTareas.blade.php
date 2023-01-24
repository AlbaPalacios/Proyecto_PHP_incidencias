@extends('layout')

@section('content')
<div class="container">
  <div class="mb-12">
    <form action="/logout" method="post">
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>
</div>
<div class="container">
  <h1>Lista de tareas</h1>
  <div class="container">
    {% if isAdmin == true %}
    <button
      type="button"
      class="btn btn-primary"
      onclick="window.location.href='/crearTarea'"
    >
      Crear tarea
    </button>
    {% endif %}
    
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">NIF/CIF</th>
        <th scope="col">Nombre Contacto</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Realizacion</th>
        <th scope="col">ID operario</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      {% for tarea in tareas %}
      <tr>
        <th scope="row">{{tarea["nif_cif"]}}</th>
        <td>{{tarea["nombre_contacto"]}}</td>
        <td>{{tarea["descripcion"]}}</td>
        {% if tarea['estado'] == 'B' > 10 %}
        <td>Esperando</td>
        {% elseif tarea['estado'] == 'P' > 0 %}
        <td>Pendiente</td>
        {% elseif tarea['estado'] == 'R' > 0 %}
        <td>Realizada</td>
        {% elseif tarea['estado'] == 'C' > 0 %}
        <td>Cancelada</td>
        {% else %}
        <td>No Válido</td>
        {% endif %}
        <td>{{tarea["fecha_realizacion"]}}</td>
        <td>{{tarea["id_operario"]}}</td>
        <td>
          {% if isAdmin == true %}
          <a
            type="button"
            href="/editarTarea/{{tarea['idtarea']}}"
            class="btn btn-info"
            >Editar</a
          >{{' '}} {% endif %}

          <a
            type="button"
            href="/mostrarTarea/{{tarea['idtarea']}}"
            class="btn btn-warning"
            >Mostrar</a
          >{{' '}} 
          {% if isAdmin == true %}
          <form action="/borrarTarea/{{tarea['idtarea']}}" method="POST">
            <button
            type="submit"
            href="/borrarTarea/{{tarea['idtarea']}}"
            class="btn btn-danger"
            >Borrar</button>
          </form>
          {% endif %}
        </td>
      </tr>
      {% endfor %}
    </tbody>
  </table>
</div>

@endsection
