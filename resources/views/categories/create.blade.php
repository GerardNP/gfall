@extends("layouts.app")

@section("title", "Crear categoría - Minijuegos")

@section("content")
<h2>Crear categoría</h2>
<form action="{{action('CategoryController@store')}}" method="post" class="container">
  @csrf
  <div class="form-group">
    <label for="id_name">Nombre</label>
    <input type="text" name="name" id="id_name" class="form-control">
    @if( $errors->has("name") )
      <span class="text-danger">{{ $errors->first("name") }}</span>
    @endif
  </div>

  <input type="submit" name="create" value="Crear" class="btn btn-primary btn-block">
</form>
@endsection
