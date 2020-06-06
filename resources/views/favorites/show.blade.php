@extends("layouts.app")
@section("title", "Favoritos - GFALL")

@section("content")
<div class="container my-3">

  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <tr>
        <th>Portada</th>
        <th>Nombre</th>
        <th>Categoría</th>
      </tr>

      @foreach($games as $game)
      <tr>
        <td>
          <img src="{{ asset($game->img) }}" alt="" height="50">
        </td>

        <td>
          <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
            {{ $game->name }}
          </a>
        </td>

        <td>
          <a href="{{ action('CategoryController@show', $game->category->slug) }}">
            <img src="{{ asset($game->category->img) }}" alt="" height="40">
          </a>
        </td>
      </tr>
      @endforeach

    </table>
  </div>


</div>
@endsection
