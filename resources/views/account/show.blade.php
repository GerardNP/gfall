@extends("layouts.app")
@section("title", "Perfil: " . $user->name . " - GFALL")
@section("content")
<div class="container mt-4">

  <div class="row">
    <div class="col-4"><!-- IMG -->
      <img src="{{ asset($account->img) }}" alt="" class="img-fluid img-thumbnail">
      <p class="h4 text-center mt-2">{{ $user->name }}</p>
      <p>{{ $account->desc }}</p>
    </div>

    <div class="col-8">
      <p class="h4">Categorías</p><!-- CATEGORIES -->
      <hr class="mb-3">
      <div class="row">
        @if ( empty($categories) )
        <div class="col-auto">
          Sin aportaciones a ninguna cateogoría.
        </div>
        @else
          @foreach( $categories as $category)
          <div class="col-4 mb-2">
            <a href="{{ action('FrontController@showCategory', $category->slug) }}">
              <div class="card">
                <h6 class="card-text text-center text-truncate px-1 py-1">{{ $category->name }}</h6>
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
            <a href="{{ action('FrontController@showGame', $game->slug) }}">
              <div class="card">
                <img src="{{ $game->image }}" alt="" class="img-fluid">
                <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->title }}</h6>
              </div>
            </a>
          </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>

  @if($aux)
    <a href="{{ action('AccountController@edit') }}" class="btn btn-block btn-primary mb-3">Editar perfil</a>
  @endif
</div>
@endsection
