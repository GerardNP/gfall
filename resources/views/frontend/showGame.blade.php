@extends("layouts.app")
@section("title", $game->title . " - GFALL")

@section("content")
<div class="container my-3">
  <div class="d-flex aling-items-center">
    <img src="{{ $game->image }}" alt="" width="120" height="80" class="rounded-lg mr-3">
    <div class="d-flex flex-column ">
      <span class="h3 font-weight-bold mt-auto mb-0">{{ $game->title }}</span>
      <p class="mb-auto">
        Categoría:
        <a href="{{ action('FrontController@showCategory', $game->category->slug) }}">{{ $game->category->name }}</a>
      </p>
      <p class="mb-auto">
        Autor:
        <a href="{{ action('AccountController@show', $game->user->name) }}">{{ $game->user->name }}</a>
      </p>
    </div>
  </div>
</div>

<section class="container-game">
  <div class="game container">
    @if( $game->slug == "piedra-papel-tijeras-lagarto-spock" )
    <button type="button" class="btn-play" id="btn-play">PLAY!</button>
    <div class="content-game" id="content-game">
      <div class="scores" id="scores"></div>

      <div class="result">
        <h2 id="result-txt"></h2>
        <div class="result-img" id="result-img"></div>
      </div>

      <div class="options" id="options">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/rock.png') }}" alt="img-rock" id="rock" name="rock" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/paper.png') }}" alt="img-paper" id="paper" name="paper" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/scissors.png') }}" alt="img-scissors" id="scissors" name="scissors" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/lizard.png') }}" alt="img-lizard" id="lizard" name="lizard" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/spock.png') }}" alt="img-spock" id="spock" name="spock" class="option">
      </div>
    </div>
    @endif
  </div>
</section>

<section class="container my-3">
  <span class="h4">Detalles</span>
  <hr>
  <p>{{ $game->description }}</p>
</section>
@endsection
