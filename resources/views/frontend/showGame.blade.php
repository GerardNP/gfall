@extends("layouts.app")

@section("title", $game->title . " - Minijuegos")

@section("content")

<section class="card-info container">
  <img src="{{ $game->image }}" alt="">
  <div class="card-info-content">
    <span class="card-info-title">{{ $game->title }}</span>
    <span class="card-info-subtitle">
      Categoría:
      <a href="{{ action('FrontController@showCategory', $game->category->slug) }}">{{ $game->category->name }}</a>
    </span>
  </div>
</section>


<section class="container-game">
  <div class="game">
    @if( $game->slug == "piedra-papel-tijeras-lagarto-spock" )
    <div class="play">
      <button type="button" class="btn-play" id="btn-play">PLAY!</button>
    </div>

    <div class="content-game" id="content-game">
      <div class="scores" id="scores">
      </div>

      <div class="result">
        <h2 id="result-txt"></h2>
        <div class="result-img" id="result-img">
        </div>
      </div>

      <div class="options">
        <div class="row-1">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/rock.png') }}" alt="img-rock" id="rock" name="rock" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/paper.png') }}" alt="img-paper" id="paper" name="paper" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/scissors.png') }}" alt="img-scissors" id="scissors" name="scissors" class="option">
        </div>

        <div class="row-2">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/lizard.png') }}" alt="img-lizard" id="lizard" name="lizard" class="option">
          <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/spock.png') }}" alt="img-spock" id="spock" name="spock" class="option">
        </div>
      </div>
    </div>
    @endif
  </div>
</section>


<section class="container">
  <span class="title-section container">Descripción</span>
  {{ $game->description }}
</section>
@endsection
