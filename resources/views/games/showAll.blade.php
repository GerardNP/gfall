@extends("layouts.app")
@section("title", "Juegos - GFALL")

@section("content")
<div style="background-color: var(--blue-secondary);" class="mb-3 py-3">
  <div class="media align-items-center container">
    <img src="{{ asset('img/admin/games.svg') }}" alt="" height="60" class="mr-3">
    <div class="media-body"style="color: var(--white);">
      <span class="my-breadcrumb" style="font-size: 20px;">
        <span class="font-weight-bolder">Juegos</span>
      </span>
      <span class="badge badge-secondary">{{ count($games) }}</span>
      <p style="font-size: 15px">
        Estos son todos los juegos publicados en GFALL, están ordenados por su fecha de publicación.
        Esperamos que os gusten.
      </p>
    </div>
  </div>
</div>

<div class="container">
  <div class="row row-cols-2 row-cols-md-3">
    @foreach( $games as $game )
    <div class="col mb-4">
      <div class="card">
        <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
          <img src="{{ asset($game->img) }}" class="card-img-top" alt="...">
          <h5 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h5>
        </a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center">
    {{ $games->links() }}
  </div>
</div>
@endsection
