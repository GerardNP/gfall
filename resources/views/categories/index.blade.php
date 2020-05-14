@extends("layouts.app")
@section("title", "Admin - Categorías - GFALL")

@section("content")
@if(Session::has("message"))
<div class="alert alert-success container mt-3">
  {{Session::get("message")}}
</div>
@endif

<h2 class="text-center mt-3">Administración de Categorías</h2>
<table class="container table">
  <tr>
    <th></th><!-- FEATURED -->
    <th>ID</th>
    <th>Icono</th>
    <th>Nombre</th>
    <th>Detalles</th>
    <th>Acciones</th>
  </tr>

  @if($categories)
    @foreach($categories as $category)
    <tr>
      <td>
        @if( $category->featured == true)
        <img src="{{ asset('img/admin/featured.svg')}}" alt="">
        @endif
      </td>
      <th>{{ $category->id }}</th>
      <td><img src="{{ asset($category->img) }}" alt="" height="50"></td>
      <td>
        <a href="">{{ $category->name }}</a>
      </td>
      <td>
        <p>{{ $category->desc }}</p>
      </td>
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
</table>

<a href="{{ action('CategoryController@create') }}" class="btn btn-primary btn-block container">Crear categoría</a>
@endsection
