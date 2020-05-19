@extends("layouts.app")
@section("title", $game->name . " - GFALL")

@section("content")
<section style="background-color: var(--blue-secondary);" class="py-3">
  <div class="media container">
    <img src="{{ asset($game->img) }}" alt="" width="120" height="80" class="rounded-lg mr-3">
    <div class="media-body"style="color: var(--white);">
      <h3 class="">{{ $game->name }}</h3>
      <span class="my-breadcrumb" style="font-size: 20px;">
        <a href="{{ action('GameController@showAll') }}" class="text-decoration-none font-weight-light" style="color: var(--white);">Juegos</a> /
        <span class="font-weight-bolder"><a href="{{ action('CategoryController@show', $game->category->slug) }}" class="text-decoration-none" style="color: var(--white);">{{ $game->category->name }}</a></span>
      </span>
    </div>
    <a href="{{ action('AccountController@show', $game->account->slug) }}" class="my-auto mr-2">
      <img src="{{ asset($game->account->img) }}" alt="" height="60" class="rounded-circle">
    </a>
    <a href="#" class="my-auto">
      <img src="{{ asset('img/admin/scores.svg') }}" alt="" height="60" >
    </a>
  </div>
</section>

<section class="container-game" style="background-image: url({{ asset('img/admin/background.png') }})">
  <div class="game container"></div>
</section>

<section class="container mt-3">
  <span class="h4">Detalles</span>
  <hr>
  <p>{{ $game->desc }}</p>
</section>
@endsection
