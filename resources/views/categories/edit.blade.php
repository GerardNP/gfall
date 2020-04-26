@extends("layouts.app")

@section("title", "Editar - Categoría")

@section("content")
<h2 class="text-center">Editar categoría</h2>
<form action="{{action('CategoryController@update', $category->id)}}" method="post">
  @csrf
  @method("PUT")
  <div class="form-group">
    <label for="id_name">Nombre</label>
    @if( $errors->has("name") )
      <input type="text" name="name" id="id_name" value="{{ $category->name }}" class="form-control is-invalid">
    @else
      <input type="text" name="name" id="id_name" value="{{ $category->name }}" class="form-control">
    @endif
    <div class="invalid-feedback">
      {{ $errors->first("name") }}
    </div>
  </div>

  <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-block">
</form>
@endsection
