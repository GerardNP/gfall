@extends("layouts.app")

@section("title", "Puntuaciones - " .  $name . " - GFALL")

@section("content")
<div class="container my-3">
  <h2 class="text-center my-3">
    Puntuaciones
    <span class="badge badge-secondary">{{ count($scores) }}</span>
  </h2>

  <div class="table-responsive my-3">
    <table class="table">
      <tr>
        <th>Portada</th>
        <th>Juego</th>
        <th>Max. puntuación</th>
      </tr>

      @if( !empty($scores[0]) )
        @foreach( $scores as $score)
        <tr>
          <td>
            <img src="{{ asset($score->game->img) }}" alt="" height="100" style="max-width: 200px;">
          </td>

          <td>
            <a href="{{ action('GameController@show', $score->game->slug) }}" class="text-decoration-none">
              {{ $score->game->name }}
            </a>
          </td>

          <td>
            {{ $score->score }}
          </td>
        </tr>
        @endforeach
      @endif
    </table>
  </div>

  @if( !empty($scores[0]) )
  <div class="d-flex justify-content-center">
    {{ $scores->links() }}
  </div>
  @endif
</div>
@endsection
