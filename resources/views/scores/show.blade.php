@extends("layouts.app")

@section("title", "Puntuaciones - GFALL")

@section("content")
<h2 class="text-center my-3">Puntuaciones</h2>
<table class="container table">
  <tr>
    <th>Portada</th>
    <th>Juego</th>
    <th>Max. puntuación</th>
  </tr>

  @foreach( $scores as $score)
  <tr>
    <td> <img src="{{ asset($score->game->img) }}" alt="" height="100"> </td>
    <td>{{ $score->game->name }}</td>
    <td>{{ $score->score }}</td>
  </tr>
  @endforeach
</table>
@endsection
