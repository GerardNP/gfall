@extends("layouts.app")

@section("titulo", "Perfil")

@section("main")
<h1>Perfil - {{$user->name}}</h1>
<table class="table">
  <tr>
    <th>Nombre</th>
    <th>Email</th>
  </tr>

  <tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
  </tr>
</table>
@endsection
