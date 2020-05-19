@extends("layouts.app")
@section("title", "Inicio - GFALL")

@section("content")
<div class="container mt-3">
  @if( Session::has("login") )
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Bienvenido {{ Auth::user()->name }}.</strong>
    Echa un vistazo a los últimos juegos.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @elseif( Session::has("register") )
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Registro completado.</strong>
    Prueba a editar tu
    <a href="{{ action('AccountController@show', Auth::user()->account->slug ) }}">perfil</a>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif




  <!-- CATEGORIES GAMES -->
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">CATEGORÍAS DESTACADAS</span>
    </div>
  </div>

  <hr class="mb-2">

  <div class="row row-cols-2 row-cols-md-6">
    @foreach( $categories as $category)
    <div class="col mb-4">
      <div class="card rounded-pill">
        <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
          <div class="row justify-content-center align-items-center">
            <img src="{{ asset($category->img) }}" class="col-3 px-0 my-1" alt="" height="30">
            <h6 class="card-title my-0 px-0 col-auto">{{ $category->name }}</h6>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>


  <!-- FEATURED GAMES -->
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS DESTACADOS</span>
    </div>
    <div>
      <a href="{{ action('GameController@showFeatured') }}" class="btn btn-secondary rounded-pill">Ver más</a>
    </div>
  </div>

  <hr class="mb-2">

  <div class="row row-cols-2 row-cols-md-3">
    @foreach( $featuredGames as $game)
    <div class="col mb-4">
      <div class="card" data-toggle="tooltip" data-placement="right" title="{{ $game->account->user->name }}">
        <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
          <img src="{{ $game->img }}" class="card-img-top" alt="">
          <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
        </a>
      </div>
    </div>
    @endforeach
  </div>


  <!-- GAMES -->
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/games.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS RECIENTES</span>
    </div>
    <div>
      <a href="{{ action('GameController@showAll') }}" class="btn btn-secondary rounded-pill">Ver más</a>
    </div>
  </div>

  <hr class="mb-2">

  <div class="row row-cols-3 row-cols-md-4">
    @foreach( $publishedGames as $game)
    <div class="col mb-4">
      <div class="card" data-toggle="tooltip" data-placement="right" title="{{ $game->account->user->name }}">
        <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
          <img src="{{ $game->img }}" class="card-img-top" alt="">
          <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
