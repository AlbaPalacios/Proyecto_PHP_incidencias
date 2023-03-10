@extends('layout')
@section('content')
<style>
  .login-form {
    width: 340px;
    margin: 50px auto;
    font-size: 15px;
  }
  .login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
  }
  .login-form h2 {
    margin: 0 0 15px;
  }
  .form-control,
  .btn {
    min-height: 38px;
    border-radius: 2px;
  }
  .btn {
    font-size: 15px;
    font-weight: bold;
  }
</style>
<div class="container">
    <div class="login-form">
        <form action="/register" method="post">
          <h2 class="text-center">Registro de usuario</h2>
          <div class="form-group">
            <label>Nombre de usuario</label>
            <input
              type="text"
              class="form-control"
              placeholder="Username"
              required="required"
              name="nombre"
            />
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              required="required"
              name="password"
            />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
          </div>
          <!-- <div class="clearfix">
            <label class="float-left form-check-label"
              ><input type="checkbox" /> Remember me</label
            >
            <a href="#" class="float-right">Forgot Password?</a>
          </div>
        </form>
        <p class="text-center"><a href="#">Create an Account</a></p> -->
      </div>
</div>

@endsection
