@extends("layouts.app")
@section("title", "Perfil: " . $account->user->name . " - GFALL")
@section("content")
<div class="container mt-3 mb-5">
  @if(Session::has("message"))
  <div class="alert alert-success mt-3 text-center">
    {{Session::get("message")}}
  </div>
  @endif


  <div class="row">
    <div class="col-12 col-md-3">{{-- IMG --}}
      <img src="{{ asset($account->img) }}" alt="" class="img-fluid img-thumbnail">
      <a href="{{ action('ScoreController@showAuthor', $account->slug) }}"
        class="text-decoration-none btn btn-secondary w-100 my-2">
        <img src="{{ asset('img/admin/scores.svg') }}" alt="" height="40">
        Ver Puntuaciones
      </a>
    </div>

    <div class="col-12 col-md-9 text-break">
      <p class="h3" style=>
        {{ "@" . $account->user->name }}
      </p>
      <p style="font-size: 20px">
        {{ $account->desc }}
      </p>
      @if( !empty($account->social_network) )
        <a href="{{ $account->social_network}}" class="text-decoration-none">
          <img src="{{ asset('img/admin/social-network.svg') }}" alt="" height="30">
          Red Social
        </a>
      @endif
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="media align-items-center mb-1 mt-3">{{-- GAMES --}}
        <img src="{{ asset('img/admin/games.svg') }}" alt="" height="40" class="mr-3">
        <div class="media-body">
          <span class="title-section">JUEGOS</span>
        </div>
        <div>
        @if( $aux)
        <a href="{{ action('GameController@create') }}">
          <img src="{{ asset('img/admin/add.svg') }}" alt="" height="38">
        </a>
        @endif
        @if( !empty($games[0]) )
          <a href="{{ action('GameController@showAuthor', $account->slug) }}"
          class="btn btn-secondary rounded-pill">
            Ver más
          </a>
        @endif
        </div>
      </div>
      <hr class="mb-2">

      @if( empty($games[0]) )
      <div class="col-12">
        Sin ningún juego publicado.
      </div>
      @else
      <div class="row row-cols-2 row-cols-md-3">
        @foreach($games as $game)
        <div class="col mb-4">
          <div class="card">
            <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
              <img src="{{ asset($game->img) }}" class="card-img-top" alt="">
              <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>


  @if($aux)
  <a href="{{ action('AccountController@edit') }}" class="btn btn-block btn-primary my-3">
    Editar perfil
  </a>
  @endif
</div>
@endsection
