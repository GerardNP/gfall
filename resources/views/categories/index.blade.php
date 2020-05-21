@extends("layouts.app")
@section("title", "Admin - Categorías - GFALL")

@section("content")
<div class="container">
  @if(Session::has("message"))
  <div class="alert alert-success mt-3 text-center">
    {{Session::get("message")}}
  </div>
  @endif
</div>

<h2 class="text-center my-3">Administración de Categorías
  <span class="badge badge-secondary">{{ count($categories) }}</span>
</h2>

<div class="table-responsive my-3">
  <table class="table">
    <tr>
      <th></th>{{-- FEATURED --}}
      <th>ID</th>
      <th>Icono</th>
      <th>Nombre</th>
      <th>Detalles</th>
      <th>Num. juegos</th>{{-- TODOS, PUBLICADOS O NO --}}
      <th>Acciones</th>
    </tr>

    @if( !empty($categories[0]) )
      @foreach($categories as $category)
      <tr>
        <td>
          @if( $category->featured == true)
          <img src="{{ asset('img/admin/featured.svg')}}" alt="" height="50">
          @endif
        </td>

        <th>
          {{ $category->id }}
        </th>

        <td>
          <img src="{{ asset($category->img) }}" alt="" height="50" class="img-fluid" style="max-width: 150px">
        </td>

        <td>
          <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
            {{ $category->name }}
          </a>
        </td>

        <td>
          <p class="text-break">{{ $category->desc }}</p>
        </td>

        <td>
          {{ count($category->games) }}
        </td>

        <td class="d-flex">
          <a href="{{ action('CategoryController@edit', $category->id) }}" class="btn btn-warning mr-1">
            Editar
          </a>
          <form action="{{ action('CategoryController@destroy', $category->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" name="delete" class="btn btn-danger"
            onclick="return confirm('¿Está seguro que quiere eliminar esta categoría?\n\nSe eliminarán todos los juegos que pertenezcan a esta categoría.')">
              Eliminar
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    @endif
  </table>
</div>

<div class="container mt-3 mb-5">
  <a href="{{ action('CategoryController@create') }}" class="btn btn-primary btn-block">
    Crear categoría
  </a>
</div>

@if( !empty($categories[0]) )
<div class="d-flex justify-content-center mt-3 mb-5">
  {{ $categories->links() }}
</div>
@endif
@endsection
