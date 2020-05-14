@extends("layouts.app")
@section("title", "Editar perfil: " . $user->name . " - GFALL")
@section("content")
<div class="container mt-3">
  <form action="{{ action('AccountController@update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="row">
      <div class="col-4">
        <div class="form-group"><!-- Imagen -->
          <label for="id_img">
            <img src="{{ asset($account->img) }}" alt="" class="img-fluid img-thumbnail">
          </label>
          <input type="file" name="img" class="form-control-file" id="id_img">
        </div>
      </div>

      <div class="col-8">
        <div class="form-group"><!-- Nombre -->
          <label for="id_name">Nombre</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="id_name">
        </div>

        <div class="form-group"><!-- Descripción -->
          <label for="id_dec">Descripción</label>
          <textarea name="desc" rows="8" class="form-control" id="id_dec">{{ $account->desc }}</textarea>
        </div>

        <div class="d-flex justify-content-center"><!-- Botones -->
          <button type="submit" class="btn btn-primary mr-1">Guardar cambios</button>
          <a href="{{ action('AccountController@show', $account->slug) }}" class="btn btn-secondary ml-1">Cancelar</a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
