@extends("layouts.app")

@section("title", "Crear - Categoría")

@section("content")
<h2 class="text-center">Crear categoría</h2>
<form action="{{action('CategoryController@store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="id_name">Nombre</label>
    @if( $errors->has("name") )
      <input type="text" name="name" id="id_name" class="form-control is-invalid">
    @else
      <input type="text" name="name" id="id_name" class="form-control">
    @endif
    <div class="invalid-feedback">
      {{ $errors->first("name") }}
    </div>
  </div>

  <input type="submit" name="create" value="Crear" class="btn btn-primary btn-block">
</form>
@endsection
