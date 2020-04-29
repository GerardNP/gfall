@extends("layouts.app")

@section("title", "Juegos - Minijuegos")

@section("content")

@if(Session::has("message"))
<div class="alert alert-success">
  {{Session::get("message")}}
</div>
@endif

<h2 class="text-center mb-3 mt-3">Administración de Juegos</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Descripción</th>
      <th scope="col">Categoría</th>
      <th scope="col">Autor</th>
      <th scope="col">Portada</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @if($games)
    @foreach($games as $game)
    <tr>
      <th scope="row">{{ $game->id }}</th>
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
        <form action="{{ action('GameController@destroy', $game->id) }}" method="post">
          @csrf
          @method("DELETE")
          <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Está seguro que quiere eliminar esta juego?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  @endif
  </tbody>
</table>

<a href="{{action('GameController@create')}}" class="btn btn-primary btn-block">Crear Juego</a>
@endsection
