@extends("layouts.app")

@section("title", "Puntuaciones - Minijuegos")

@section("content")
<h1>Puntuaciones</h1>
<table class="container">
  <tr>
    <th>Juego</th>
    <th>Máxima puntuación</th>
  </tr>

  @foreach( $scores as $score)
  <tr>
    <td>{{ $score->game->title }}</td>
    <td>{{ $score->score }}</td>
  </tr>
  @endforeach
</table>
@endsection
