@extends("layouts.app")
@section("title", $game->name . " - GFALL")

@section("content")
<section style="background-image: url({{ asset('img/admin/background-header-section.webp') }});"
class="py-3 background-center">
  <div class="media align-items-center container ">
    <img src="{{ asset($game->img) }}" alt="" height="80" class="rounded mr-3 " style="max-width: 150px">

    <div class="media-body align-items-center text-break" style="color: var(--white);">
      <span style="font-size: 25px;" class="d-block">{{ $game->name }}</span>
      <span style="font-size: 20px;">
        <a href="{{ action('GameController@showAll') }}" class="text-decoration-none font-weight-light"
        style="color: var(--white);">
          Juegos
        </a>
        /
        <span class="font-weight-bolder">
          <a href="{{ action('CategoryController@show', $game->category->slug) }}" class="text-decoration-none"
            style="color: var(--white);">
            {{ $game->category->name }}
          </a>
        </span>
      </span>
    </div>
  </div>
</section>


<section style="background-image: url({{ asset('img/admin/background-game.png') }})"
class="container-game">
  <div class="game container"></div>
</section>


<section class="container mt-3 mb-5">
  <div class="row my-3">
    <div class="col-6">
      <a href="{{ action('ScoreController@showGame', $game->slug) }}" class="btn btn-block btn-secondary">
        <img src="{{ asset('img/admin/scores.svg') }}" alt="" height="50">
        <span class="d-block">Puntuaciones</span>
      </a>
    </div>

    <div class="col-6">
      <a href="{{ action('AccountController@show', $game->account->slug) }}" class="btn btn-block btn-secondary">
        <img src="{{ asset($game->account->img) }}" alt="" height="50" class="rounded-circle">
        <span class="d-block text-break">{{$game->account->user->name}}</span>
      </a>
    </div>
  </div>


  @if( !empty($game->desc) )
  <span class="h4">Detalles</span>
  <hr class="mb-2">
  <p>{{ $game->desc }}</p>
  @endif
</section>
@endsection
