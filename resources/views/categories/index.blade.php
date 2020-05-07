@extends("layouts.app")

@section("title", "Categorías - Minijuegos")

@section("content")

@if(Session::has("message"))
<div class="alert alert-success container">
  {{Session::get("message")}}
</div>
@endif

<h2>Administración de Categorías</h2>
<table class="container">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acciones</th>
  </tr>

  @if($categories)
    @foreach($categories as $category)
    <tr>
      <th>{{$category->id}}</th>
      <td>
        <a href="{{ action('FrontController@showCategory', $category->slug) }}">{{$category->name}}</a>
      </td>
      <td class="d-flex" style="justify-content: center;">
        <a href="{{ action('CategoryController@edit', $category->id) }}" class="btn btn-warning">Editar</a>
        &nbsp;
        <form action="{{ action('CategoryController@destroy', $category->id) }}" method="post">
          @csrf
          @method("DELETE")
          <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Está seguro que quiere eliminar esta categoría?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  @endif
</table>

<a href="{{action('CategoryController@create')}}" class="btn btn-primary btn-block container">Crear Categoría</a>
@endsection
