@extends("layouts.app")

@section("titulo", "Registrarse")

@section("main")
<h1>Registro</h1>
<form class="" action="{{action('UsersController@store')}}" method="post">
  @csrf
  <label for="id_name">Nombre</label>
  <input type="text" name="name" id="id_name"><br><br>

  <label for="id_email">Correo</label>
  <input type="email" name="email" id="id_email"><br><br>

  <label for="id_password">Contraseña</label>
  <input type="password" name="password" id="id_password"><br><br>

  <input type="submit" name="signup" value="Registrarse"><br><br>
</form>

@if( isset($_POST["signup"]) )
  DSFDGFHG
@endif
@endsection
