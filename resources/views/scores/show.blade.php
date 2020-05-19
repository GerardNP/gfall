@extends("layouts.app")

@section("title", "Puntuaciones - GFALL")

@section("content")
<div class="container">
  <h2 class="text-center mt-3">Puntuaciones</h2>
  <div class="table-responsive mt-3">
    <table class="table">
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
  </div>

  <div class="d-flex justify-content-center">
    {{ $scores->links() }}
  </div>
</div>
@endsection
