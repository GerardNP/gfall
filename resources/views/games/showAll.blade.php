@extends("layouts.app")
@section("title", "Juegos - GFALL")

@section("content")
<section style="background-image: url({{ asset('img/admin/background-header-section.webp') }});"
class="mb-3 py-3 background-center">
  <div class="media align-items-center container">
    <img src="{{ asset('img/admin/games.svg') }}" alt="" height="60" class="mr-3 rounded"
    style="max-width: 150px">

    <div class="media-body text-break" style="color: var(--white);">
      <span class="font-weight-bolder" style="font-size: 20px;">
        Juegos
        <span class="badge badge-secondary">{{ $results }}</span>
      </span>
      <p style="font-size: 15px">
        Estos son todos los juegos publicados en GFALL, están ordenados por su fecha de publicación.
        Esperamos que os gusten.
      </p>
    </div>
  </div>
</section>

<section class="container my-3">
  @if( empty($games[0]) )
    Actualmente no hay juegos publicados.
  @else
  <div class="row row-cols-2 row-cols-md-3 align-items-center">
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
  @endif
</section>
@endsection
