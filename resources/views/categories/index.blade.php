@extends("layouts.app")

@section("title", "Categorías - Juegos")

@section("content")

@if(Session::has("message"))
<div class="alert alert-success">
  {{Session::get("message")}}
</div>
@endif

<h2 class="text-center mb-3">Categorías - Juegos</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @if($categories)
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td class="d-flex">
        <a href="{{ action('CategoryController@edit', $category->id) }}" class="btn btn-warning mr-1">Editar</a>
        <form action="{{ action('CategoryController@destroy', $category->id) }}" method="post">
          @csrf
          @method("DELETE")
          <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Está seguro que quiere eliminar esta categoría?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  @endif
  </tbody>
</table>

<a href="{{action('CategoryController@create')}}" class="btn btn-primary btn-block">Crear Categoría</a>
@endsection
