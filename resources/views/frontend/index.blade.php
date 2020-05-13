@extends("layouts.app")
@section("title", "Inicio - GFALL")

@section("content")
<div class="container mt-3">
<p class="h3">Lista de juegos</p>
<hr class="mb-3">

  <div class="deck-cards">
    <div class="row">
      @foreach( $games as $game)
      <div class="col-3 mb-2">
        <a href="{{ action('FrontController@showGame', $game->slug) }}">
          <div class="card">
            <img src="{{ $game->image }}" alt="" class="img-fluid">
            <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->title }}</h6>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
