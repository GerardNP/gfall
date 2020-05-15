@extends("layouts.app")

@section("title", $category->name . " - GFALL")

@section("content")
<div class="container">
  <h2 class="text-center">{{ $category->name }}</h2>
  <div class="row row-cols-1 row-cols-md-4">

    @foreach( $games as $game )
    <div class="col mb-4">
      <div class="card">
        <a href="{{ action('GameController@show', $game->slug) }}">
          <img src="{{ asset($game->img) }}" class="card-img-top" alt="...">
          <h5 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h5>
        </a>
      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection
