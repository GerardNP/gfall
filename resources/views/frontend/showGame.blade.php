@extends("layouts.app")

@section("title", $game->title . " - Minijuegos")

@section("content")
<h1>{{ $game->title }}</h1>
<img src="{{ $game->image }}" alt="" width="80" height="80">
<strong>
  Categoría:
  <a href="{{ action('FrontController@showCategory', $game->category->slug) }}">{{ $game->category->name}}</a>
</strong>
<div class="game" style="background-color: grey; height: 500px; margin: 2em auto">
</div>
<h3>Descripción</h3>
<p>
  {{ $game->description }}
</p>
@endsection
