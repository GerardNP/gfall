@extends("layouts.app")

@section("title", "Juegos")

@section("content")

@if(Session::has("message"))
<div class="alert alert-success">
  {{Session::get("message")}}
</div>
@endif

<h2 class="text-center mb-3">Juegos</h2>
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
      <td>{{ $game->title }}</td>
      <td>{{ $game->description }}</td>
      <td>{{ $game->category->name }}</td>
      <td>{{ $game->user->name }}</td>
      <td><img src="{{ $game->image }}" width="60" height="60" class="img-fluid"></td>
      <td class="d-flex">
        <a href="{{ action('GamesController@edit', $game->id) }}" class="btn btn-warning mr-1">Editar</a>
        <form action="{{ action('GamesController@destroy', $game->id) }}" method="post">
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

<a href="{{action('GamesController@create')}}" class="btn btn-primary btn-block">Crear Juego</a>
@endsection
