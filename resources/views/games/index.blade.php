@extends("layouts.app")
@section("title", "Admin - Juegos - GFALL")

@section("content")
<div class="container">

  @if(Session::has("message"))
  <div class="alert alert-success mt-3">
    {{Session::get("message")}}
  </div>
  @endif

  <h2 class="text-center mt-3">Administración de Juegos
    <span class="badge badge-secondary">{{ count($games) }}</span>
  </h2>

  <div class="table-responsive mt-3">
    <table class="table">
      <tr>
        <th></th><!-- FEATURED -->
        <th>ID</th>
        <th>Portada</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Autor</th>
        <th>Estado</th>
        <th>Detalles</th>
        <th>Acciones</th>
      </tr>

      @if($games)
        @foreach($games as $game)
        <tr>
          <td>
            @if( $game->featured == true)
            <img src="{{ asset('img/admin/featured.svg')}}" alt="" height="40">
            @endif
          </td>

          <th>{{ $game->id }}</th>

          <td><img src="{{ asset($game->img) }}" alt="" height="50"></td>

          <td><a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">{{ $game->name }}</a></td>

          <td><a href="{{ action('CategoryController@show', $game->category->slug) }}" class="text-decoration-none">{{ $game->category->name }}</a></td>

          <td><a href="{{ action('AccountController@show', $game->account->slug) }}" class="text-decoration-none">{{ $game->account->user->name }}</a></td>

          <td>
            @if( $game->published == true)
            <img src="{{ asset('img/admin/published.svg') }}" alt="" height="40">
            @else
            <img src="{{ asset('img/admin/not-published.svg') }}" alt="" height="40">
            @endif
          </td>

          <td><p>{{ $game->desc }}</p></td>

          <td class="d-flex">
            <a href="{{ action('GameController@edit', $game->id) }}" class="btn btn-warning mr-1">Editar</a>
            <form action="{{ action('GameController@destroy', $game->id) }}" method="post">
              @csrf
              @method("DELETE")
              <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Está seguro que quiere eliminar este juego?')">Eliminar</button>
            </form>
          </td>

        </tr>
        @endforeach
      @endif
    </table>
  </div>

  <div class="d-flex justify-content-center">
    {{ $games->links() }}
  </div>

</div>
@endsection
