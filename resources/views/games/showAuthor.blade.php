@extends("layouts.app")
@section("title", "Juegos recientes - GFALL")

@section("content")
<div style="background-image: url({{ asset('img/admin/background-header-section.webp') }});"
class="py-3 background-center">
  <div class="media align-items-center container">
    <img src="{{ asset($account->img) }}" alt="" height="60" class="mr-3 rounded" style="max-width: 150px">
    <div class="media-body text-break" style="color: var(--white); font-size: 20px;">
      <a href="{{ action('GameController@showAll') }}" class="text-decoration-none font-weight-light"
      style="color: var(--white);">
        Juegos
      </a>
      /
      <a href="{{ action('AccountController@show', $account->slug) }}"
      class="text-decoration-none font-weight-bolder" style="color: var(--white);">
        {{ $account->user->name }}
      </a>
      <span class="badge badge-secondary">
        {{ $results }}
      </span>
      <p style="font-size: 15px">
        Estos son los juegos que ha publicado el usuario {{ $account->user->name }}.
        Esperamos que os gusten.
      </p>
    </div>
  </div>
</div>

<div class="container my-3">
  @if( empty($games[0]) )
    Actualmente {{ $account->user->name }} no tiene juegos publicados.
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
</div>
@endsection
