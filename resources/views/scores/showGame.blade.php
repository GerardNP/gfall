@extends("layouts.app")

@section("title", "Puntuaciones - " .  $game->name . " - GFALL")

@section("content")
<div class="container my-3">
  <h2 class="text-center my-3">
    TOP 5 - Mejores Jugadores
    <span class="badge badge-secondary">{{ count($scores) }}</span>
  </h2>

  <div class="table-responsive my-3">
    <table class="table">
      <tr>
        <th>Pos.</th>
        <th>Max. puntuación</th>
        <th>Nombre</th>
        <th>Perfil</th>
      </tr>

      @if( !empty($scores[0]) )
        @php $cont = 0; @endphp
        @foreach( $scores as $score)
          @php $dir = 'img/admin/scores'; @endphp
        <tr>
          <td>
            @php ++$cont;
            if( $cont == 1) {
              $dir .= '-first.svg';
            } else if( $cont == 2 ) {
              $dir .= '-second.svg';
            } else if( $cont == 3 ) {
              $dir .= '-third.svg';
            } else {
              $dir .= '-bests.svg';
            }
            @endphp
            <img src="{{ asset($dir) }}" alt="" height="80" style="max-width: 100px;">
          </td>

          <td>
            {{ $score->score }}
          </td>

          <td>
            <a href="{{ action('AccountController@show', $score->account->slug) }}"
              class="text-decoration-none">
              {{ $score->account->user->name }}
            </a>
          </td>

          <td>
            <img src="{{ asset($score->account->img) }}" alt="" height="100" style="max-width: 150px;">
          </td>
        </tr>
        @endforeach
      @endif
    </table>
  </div>

</div>
@endsection
