@extends("layouts.app")
@section("title", "Admin - Juegos - GFALL")

@section("content")
@if(Session::has("message"))
<div class="alert alert-success container mt-3">
  {{Session::get("message")}}
</div>
@endif

<h2 class="text-center mt-3">Administración de Juegos</h2>
<table class="container table">
  <tr>
    <th></th><!-- FEATURED -->
    <th>ID</th>
    <th>Portada</th>
    <th>Nombre</th>
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

      <td><a href="">{{ $game->name }}</a></td>

      <td>
        @if( $game->published == true)
        <img src="{{ asset('img/admin/published.svg') }}" alt="" height="40">
        @else
        <img src="{{ asset('img/admin/not-published.svg') }}" alt="" height="40">
        @endif
      </td>

      <td>
        <p>{{ $game->desc }}</p>
      </td>

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
@endsection
