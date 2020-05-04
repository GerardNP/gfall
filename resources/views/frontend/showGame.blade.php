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
  </div>
</section>

<div class="container">
  <span class="title-section container">Descripción</span>
</div>
<section class="container">
  {{ $game->description }}
</section>
<!-- <main>
  <h1>Piedra, Papel, Tijeras, Lagarto, Spock 👨‍💻</h1>

  <section class="game">
    <div class="div_button_play">
      <button type="button" class="button_play">PLAY!</button>
    </div>

    <div class="content_game">

      <div class="scores">
      </div>

      <div class="result">
        <div class="center_images">
        </div>
      </div>

      <div class="options">
        <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/rock.png') }}" alt="img-rock" height="150" id="rock" name="rock">
        <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/paper.png') }}" alt="img-paper" height="160" id="paper" name="paper">
        <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/scissors.png') }}" alt="img-scissors" height="150" id="scissors" name="scissors">
      </div>

      <div class="options">
        <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/lizard.png') }}" alt="img-lizard" height="180" id="lizard" name="lizard">
        <img src="{{ asset('piedra-papel-tijeras-lagarto-spock/img/spock.png') }}" alt="img-spock" height="180" id="spock" name="spock">
      </div>
    </div>

  </section>
</main> -->

@endsection
