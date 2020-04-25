@extends("layouts.app")

@section("titulo", "Login")

@section("main")
<h1>Login</h1>
<form class="" action="#" method="post">
@csrf
<label for="id_email">Correo</label><br>
<input type="email" name="email" id="id_email"><br><br>

<label for="id_password">Contraseña</label><br>
<input type="password" name="password" id="id_password"><br><br>

<input type="submit" name="login" value="Iniciar sesión"><br><br>
</form>
@endsection
