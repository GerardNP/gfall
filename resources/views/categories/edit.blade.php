@extends("layouts.app")

@section("title", "Editar categoría - Minijuegos")

@section("content")
<h2>Editar categoría</h2>
<form action="{{action('CategoryController@update', $category->id)}}" method="post" class="container">
  @csrf
  @method("PUT")
  <div class="form-group">
    <label for="id_name">Nombre</label>
    <input type="text" name="name" id="id_name" value="{{ $category->name }}" class="form-control">
    @if( $errors->has("name") )
      <span class="text-danger">{{ $errors->first("name") }}</span>
    @endif
  </div>

  <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-block">
</form>
@endsection
