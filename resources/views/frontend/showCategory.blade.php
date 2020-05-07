@extends("layouts.app")

@section("title", $category->name . " - Minijuegos")

@section("content")
<h2>{{ $category->name }}</h2>

<div class="deck-cards container">
  @foreach( $games as $game)
  <article class="card">
    <img src="{{ $game->image }}" alt="">
    <a href="{{ action('FrontController@showGame', $game->slug) }}" class="card-title">{{ $game->title}}</a>
    <p>{{ $game->description }}</p>
    <span class="card-author">Autor: {{ $game->user->name }}</span>
  </article>
  @endforeach
</div>
@endsection
