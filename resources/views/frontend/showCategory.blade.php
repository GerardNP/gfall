@extends("layouts.app")

@section("title", $category->name . " - Minijuegos")

@section("content")
<h1>{{ $category->name }}</h1>
<div class="container row">
  @foreach( $games as $game)
  <div class="card mb-3 mt-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ $game->image }}" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $game->title }}</h5>
          <p class="card-text">{{ substr($game->description, 0, 100) }}...</p>
          <a href="{{ action('FrontController@showGame', $game->slug) }}" class="stretched-link">Continuar leyendo</a>
          <p class="card-text"><small class="text-muted">{{ $game->created_at->format("d/m/y") }}</small></p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection