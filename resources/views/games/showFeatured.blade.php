@extends("layouts.app")
@section("title", "Juegos destacados - GFALL")

@section("content")
<div style="background-image: url({{ asset('img/admin/background-header-section.webp') }});" class="mb-3 py-3">
  <div class="media align-items-center container">
    <img src="{{ asset('img/admin/featured-categories.png') }}" alt="" height="60" class="mr-3 rounded"
    style="max-width: 150px">

    <div class="media-body text-break"style="color: var(--white);">
      <span class="my-breadcrumb" style="font-size: 20px;">
        <a href="{{ action('GameController@showAll') }}" class="text-decoration-none font-weight-light"
          style="color: var(--white);">
          Juegos
        </a>
        /
        <span class="font-weight-bolder">Juegos Destacados</span>
        <span class="badge badge-secondary">
          {{ count($games) }}
        </span>
      </span>
      <p style="font-size: 15px;">
        Esta es una selección de juegos seleccionada por los administradores de GFALL.
        Esperamos que os gusten.
      </p>
    </div>
  </div>
</div>


<div class="container my-3">
  @if( empty($games[0]) )
    Actualmente no hay juegos destacados.
  @else
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
  @endif
</div>
@endsection
