@extends("layouts.app")

@section("title", "Crear juego - Minijuegos")

@section("content")
<h2 class="text-center">Crear Juego</h2>
<form action="{{ action('GameController@store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="user_id" value="{{$user->id}}">

  <div class="form-group">
    <label for="id_category_id">Categoría</label>
    <select class="form-control" name="category_id" id="id_category_id">
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="id_title">Título</label>
    <input type="text" name="title" id="id_title" value="{{ old('title') }}" class="form-control">
    @if( $errors->has("title") )
      <strong class="text-danger">{{ $errors->first("title") }}</strong>
    @endif
  </div>

  <div class="form-group">
    <label for="id_description">Descripción</label>
    <textarea name="description" rows="3" cols="80" id="id_description" class="form-control">{{ old('description') }}</textarea>
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

  <input type="submit" name="create" value="Crear" class="btn btn-primary btn-block">
</form>
@endsection
