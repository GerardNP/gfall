@extends("layouts.app")

@section("title", "Crear - Juego")

@section("content")
<h2>Crear Juego</h2>
<form action="{{ action('GameController@update', $game->id) }}" method="post" enctype="multipart/form-data" class="container">
  @csrf
  @method("PUT")

  <div class="form-group">
    <label for="id_category_id">Categoría</label>
    <select class="form-control" name="category_id" id="id_category_id">
      @foreach($categories as $category)
        @if( $category->name == $game->category->name )
        <option value="{{ $category->id }}" selected>
        @else
        <option value="{{ $category->id }}">
        @endif
          {{ $category->name }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="id_title">Título</label>
    <input type="text" name="title" id="id_title" value="{{ $game->title }}" class="form-control">
    @if( $errors->has("title") )
      <strong class="text-danger">{{ $errors->first("title") }}</strong>
    @endif
  </div>

  <div class="form-group">
    <label for="id_description">Descripción</label>
    <textarea name="description" rows="3" cols="80" id="id_description" class="form-control">{{ $game->description }}</textarea>
    @if( $errors->has("description") )
      <strong class="text-danger">{{ $errors->first("description") }}</strong>
    @endif
  </div>

  <div class="form-group">
    <label for="id_image">Imagen</label>
    <input type="file" name="image" id="id_image" class="form-control-file">
    @if( $errors->has("image") )
      <strong class="text-danger">{{ $errors->first("image") }}</strong>
    @endif
  </div>

  <img src="{{ $game->image }}" alt="" class="img-fluid mb-3" width="200">

  <input type="submit" name="update" value="Actualizar" class="btn btn-primary btn-block">
</form>
@endsection
