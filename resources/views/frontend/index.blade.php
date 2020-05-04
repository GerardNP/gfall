@extends("layouts.app")

@section("title", "Inicio - Minijuegos")

@section("content")
<div class="container">
  <span class="title-section">Lista de juegos</span>
</div>

<div class="deck-cards container">
  @foreach($games as $game)
    <article class="card">
      <img src="{{ $game->image }}" alt="">
      <a href="{{ action('FrontController@showGame', $game->slug) }}" class="card-title">{{ $game->title}}</a>
      <p>{{ $game->description }}</p>
      <span class="card-author">Autor: {{ $game->user->name }}</span>
    </article>
  @endforeach
</div>
@endsection
