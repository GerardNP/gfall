@extends("layouts.app")

@section("titulo", "Editar Perfil")

@section("main")
<h1>Editar Perfil - {{$user->name}}</h1>
<form class="" action="{{action('UsersController@update', $user->id)}}" method="post">
  @csrf
  @method("PUT")
  <label for="id_name">Nombre</label>
  <input type="text" name="name" id="id_name" value="{{$user->name}}"><br><br>

  <label for="id_email">Correo</label>
  <input type="email" name="email" id="id_email" value="{{$user->email}}"><br><br>

  <label for="id_password">Contraseña</label>
  <input type="password" name="password" id="id_password" value="{{$user->password}}"><br><br>

  <input type="submit" name="save" value="Guardar"><br><br>
</form>
@endsection
