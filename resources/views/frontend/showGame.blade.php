@extends("layouts.app")

@section("title", $game->title . " - Minijuegos")

@section("content")
<h1>{{ $game->title }}</h1>
<img src="{{ $game->image }}" alt="" width="80" height="80">
<strong>
  Categoría:
  <a href="{{ action('FrontController@showCategory', $game->category->slug) }}">{{ $game->category->name}}</a>
</strong>
<!-- <div class="game" style="background-color: grey; height: 500px; margin: 2em auto">
</div> -->
<main>
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
</main>
<h3>Descripción</h3>
<p>
  {{ $game->description }}
</p>
@endsection
