@extends("layouts.app")
@section("title", "Búsqueda - GFALL")

@section("content")
  <div class="container my-3">

    <form action="{{ action("SearchController@index") }}" method="get" class="">
      <div class="row my-3">
        <input name="name" type="search" placeholder="Buscar" class="form-control col py-4" aria-label="Search">
        <button type="submit" class="btn btn-outline-secondary col-3">Buscar</button>
      </div>
    </form>

    <div class="d-flex justify-content-center my-3">
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ action('SearchController@index') }}" class="btn btn-outline-secondary active">Todo</a>
        <a href="{{ action('SearchController@users') }}" class="btn btn-outline-secondary">Usuarios</a>
        <a href="{{ action('SearchController@games') }}" class="btn btn-outline-secondary">Juegos</a>
      </div>
    </div>


    @if( isset($users) && !empty($users) )
    <div class="table-responsive mt-4">
      <table class="table table-hover">
        <caption>x resultados</caption>
        <tr>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Link</th>
        </tr>

        @foreach($users as $user)
        <tr>
          <td>
            <img src="{{ asset($user->account->img) }}" alt="" height="50">
          </td>

          <td>
            <a href="{{ action('AccountController@show', $user->account->slug) }} class="text-decoration-none"">
              {{ $user->name }}
            </a>
          </td>

          <td>
            @if( isset($user->account->social_network) )
              <a href="{{ $user->account->social_network }}">
                <img src="{{ asset('img/admin/social-network.svg') }}" alt="" height="40">
              </a>
            @endif
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    @endif


    @if( isset($games) && !empty($games) )
    <div class="table-responsive mt-4">
      <table class="table table-hover">
        <caption>x resultados</caption>
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
    @endif

    @if( !empty($games) )
    <div class="d-flex justify-content-center mb-4">
      {{ $games->appends(["name" => $name ])->links() }}
    </div>
    @endif
  </div>
@endsection
