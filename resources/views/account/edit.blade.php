@extends("layouts.app")
@section("title", "Editar perfil: " . $user->name . " - GFALL")
@section("content")
<div class="container mt-3">
  <form action="{{ action('AccountController@update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="row">
      <div class="col-4">
        <!-- Imagen -->
        <div class="form-group">
          <label for="id_img">
            @if( empty($user->img) )
            <img src="{{ asset('users/default.svg') }}" alt="" class="img-fluid img-thumbnail">
            @else
            <img src="{{ asset($user->img) }}" alt="" class="img-fluid img-thumbnail">
            @endif
          </label>
          <input type="file" name="img" class="form-control-file" id="id_img">
        </div>
      </div>

      <div class="col-8">
        <!-- Nombre -->
        <div class="form-group">
          <label for="id_name">Nombre</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="id_name">
        </div>

        <!-- Descripción -->
        <div class="form-group">
          <label for="id_decription">Descripción</label>
          <textarea name="description" rows="8" class="form-control" id="id_decription">{{ $user->description }}</textarea>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary mr-1">Guardar cambios</button>
          <a href="{{ action('AccountController@edit') }}" class="btn btn-secondary ml-1">Cancelar</a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
