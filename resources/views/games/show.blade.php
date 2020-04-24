@extends("layouts.app")

@section("titulo", $game->name)

@section("main")
<table class="table">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
  </tr>

  <tr>
    <td>{{$game->id}}</td>
    <td>{{$game->name}}</td>
  </tr>

</table>
@endsection
