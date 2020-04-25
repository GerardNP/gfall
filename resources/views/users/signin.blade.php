@extends("layouts.app")

@section("titulo", "Iniciar sesión")

@section("main")
<h1>Iniciar sesión</h1>
<form class="" action="index.html" method="post">
  <label for="id_email">Correo</label>
  <input type="email" name="email" id="id_email"><br><br>

  <label for="id_password">Contraseña</label>
  <input type="password" name="password" id="id_password"><br><br>

  <input type="submit" name="signin" value="Iniciar sesión"><br><br>
</form>
@endsection
