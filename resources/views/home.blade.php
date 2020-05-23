@extends("layouts.app")
@section("title", "Inicio - GFALL")

@section("content")
<div class="container my-3">

  @if( Session::has("register") )
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Registro completado.</strong>
    Prueba a editar tu
    <a href="{{ action('AccountController@show', Auth::user()->account->slug ) }}">perfil</a>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif


  {{-- CATEGORIES FEATURED  --}}
  @if( !empty($categories[0]) )
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured-categories.png') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">CATEGORÍAS DESTACADAS</span>
    </div>
  </div>

  <hr class="mb-2">

  <div class="row row-cols-1 row-cols-md-4 mb-4">
  @foreach( $categories as $category)
   <div class="col mb-2">
     <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
       <div class="media border rounded-pill py-2">
          <img src="{{ asset($category->img) }}" class="align-self-center mx-3" alt="..." height="40">
          <div class="media-body d-flex align-self-center">
            <span class="mt-0 text-break">{{ $category->name }}</span>
          </div>
      </div>
    </a>
   </div>
  @endforeach
  </div>
@endif


  {{-- FEATURED GAMES --}}
  @if( !empty($featuredGames[0]) )
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured-games.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS DESTACADOS</span>
    </div>
    <div>
      <a href="{{ action('GameController@showFeatured') }}" class="btn btn-secondary rounded-pill">
        Ver más
      </a>
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
  @endif

  {{-- ALL GAMES --}}
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/games.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS RECIENTES</span>
    </div>
    @if( !empty($publishedGames[0]) )
      <a href="{{ action('GameController@showAll') }}" class="btn btn-secondary rounded-pill">Ver más</a>
    @endif
  </div>

  <hr class="mb-2">

  @if( empty($publishedGames[0]) )
    Actualmente no hay juegos publicados.
  @else
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
  @endif

</div>
@endsection
