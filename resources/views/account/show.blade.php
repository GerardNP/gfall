@extends("layouts.app")
@section("title", "Perfil: " . $user->name . " - GFALL")
@section("content")
<div class="container mt-4">

  <div class="row">
    <div class="col-4"><!-- IMG -->
      <img src="{{ asset($account->img) }}" alt="" class="img-fluid img-thumbnail">
      <p class="h4 text-center mt-2">{{ $user->name }}</p>
      <p>{{ $account->desc }}</p>
      <a href="{{ action('ScoreController@show', $account->slug) }}">Puntuaciones</a>
    </div>

    <div class="col-8">
      <p class="h4">Categorías</p><!-- CATEGORIES -->
      <hr class="mb-3">
      <div class="row">
        @if ( empty($categories) )
        <div class="col-auto">
          Sin aportaciones a ninguna categoría.
        </div>
        @else
          @foreach( $categories as $category)
          <div class="col-4 mb-2">
            <a href="{{ action('CategoryController@show', $category->slug) }}">
              <div class="d-flex flex-row justify-content-center align-items-center border rounded-pill py-2">
                <img src="{{ asset($category->img) }}" alt="" height="30">
                <h6 class="card-title text-center text-truncate mb-0 ml-2">{{ $category->name }}</h6>
              </div>
            </a>
          </div>
          @endforeach
        @endif
      </div>

      <p class="h4 mt-3">Juegos</p><!-- GAMES -->
      <hr class="mb-3">
      <div class="row mb-3">
        @if( empty($games[0]) )
        <div class="col-auto">
          Sin ningún juego.
        </div>
        @else
          @foreach( $games as $game)
          <div class="col-4 mb-2">
            <a href="{{ action('GameController@show', $game->slug) }}">
              <div class="card">
                <img src="{{ asset($game->img) }}" alt="" class="img-fluid">
                <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
              </div>
            </a>
          </div>
          @endforeach
          <div class="row mt-3">
            <div class="col-4">
              <a href="{{ action('GameController@create') }}"><img src="{{ asset('img/admin/add.svg') }}" alt="" height="50"></a>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

  @if($aux)
    <a href="{{ action('AccountController@edit') }}" class="btn btn-block btn-primary my-3">Editar perfil</a>
  @endif
</div>
@endsection
