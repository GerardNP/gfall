@extends("layouts.app")
@section("title", "Inicio - GFALL")

@section("content")
<div class="container mt-3">
<p class="h3">Categorías destacadas</p><!-- FEATURED CATEGORIES -->
<hr class="mb-3">
  <div class="deck-cards">
    <div class="row">
      @foreach( $categories as $category)
      <div class="col-3 mb-2">
        <a href="{{ action('CategoryController@show', $category->slug) }}">
          <div class="d-flex flex-row justify-content-center align-items-center border rounded-pill py-2">
            <img src="{{ asset($category->img) }}" alt="" height="30">
            <h6 class="card-title text-center text-truncate mb-0 ml-2">{{ $category->name }}</h6>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="container mt-3">
<p class="h3">Juegos destacados</p><!-- FEATURED GAMES -->
<hr class="mb-3">
  <div class="deck-cards">
    <div class="row">
      @foreach( $featuredGames as $game)
      <div class="col-3 mb-2">
        <a href="{{ action('GameController@show', $game->slug) }}">
          <div class="card">
            <img src="{{ $game->img }}" alt="" class="img-fluid">
            <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="container mt-3">
<p class="h3">Juegos recientes</p><!-- GAMES -->
<hr class="mb-3">
  <div class="deck-cards">
    <div class="row">
      @foreach( $publishedGames as $game)
      <div class="col-2 mb-2">
        <a href="">
          <div class="card">
            <img src="{{ $game->img }}" alt="" class="img-fluid">
            <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
