@extends("layouts.app")

@section("titulo", $game->title)

@section("content")
<table class="table">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Título</th>
  </tr>

  <tr>
    <td>{{$game->id}}</td>
    <td>{{$game->name}}</td>
    <td>{{$game->title}}</td>
  </tr>

</table>
@endsection
