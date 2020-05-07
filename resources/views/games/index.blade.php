@extends("layouts.app")

@section("title", "Juegos - Minijuegos")

@section("content")

@if(Session::has("message"))
<div class="alert alert-success container">
  {{Session::get("message")}}
</div>
@endif

<h2>Administración de Juegos</h2>
<table class="container">
  <tr>
    <th>ID</th>
    <th>Título</th>
    <th>Descripción</th>
    <th>Categoría</th>
    <th>Autor</th>
    <th>Portada</th>
    <th>Acciones</th>
  </tr>

  @if($games)
    @foreach($games as $game)
    <tr>
      <th>{{ $game->id }}</th>
      <td>
        <a href="{{ action('FrontController@showGame', $game->slug) }}">{{ $game->title }}</a>
      </td>
      <td>{{ $game->description }}</td>
      <td>
        <a href="{{ action('FrontController@showCategory', $game->category->slug) }}">{{ $game->category->name }}
      </td>
      <td>{{ $game->user->name }}</td>
      <td><img src="{{ $game->image }}" width="60" height="60" class="img-fluid"></td>
      <td class="d-flex">
        <a href="{{ action('GameController@edit', $game->id) }}" class="btn btn-warning mr-1">Editar</a>
        &nbsp;
        <form action="{{ action('GameController@destroy', $game->id) }}" method="post">
          @csrf
          @method("DELETE")
          <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Está seguro que quiere eliminar esta juego?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  @endif
</table>

<a href="{{action('GameController@create')}}" class="btn btn-block btn-primary container">Crear Juego</a>
@endsection
