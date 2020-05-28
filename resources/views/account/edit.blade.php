@extends("layouts.app")
@section("title", "Editar perfil: " . $account->user->name . " - GFALL")
@section("content")
<div class="container mt-3 mb-5">
  <form action="{{ action('AccountController@update', $account->id) }}" method="post"
  enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="row">
      <div class="col-4">
        <div class="form-group">{{-- Imagen --}}
          <img src="{{ asset($account->img) }}" alt="" class="img-fluid img-thumbnail">
          <input type="file" name="img" size="5" class="mt-2 w-100 form-control-file
            @error('img') is-invalid @enderror">
          @error("img")
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="col-8">
        <div class="form-group">{{-- Nombre --}}
          <label for="id_name">Nombre</label>
          <input type="text" name="name" value="{{ $account->user->name }}"
          class="form-control @error('name') is-invalid @enderror" id="id_name">
          @error("name")
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">{{-- Descripción --}}
          <label for="id_dec">Descripción</label>
          <textarea name="desc" rows="8"
          class="form-control @error('desc') is-invalid @enderror" id="id_dec">{{ $account->desc }}</textarea>
        </div>

        <div class="form-group">{{-- RED SOCIAL --}}
          <label for="social_network">Red Social</label>
          <input type="text" name="social_network" class="form-control @error('social_network') is-invalid @enderror"
            value="{{ $account->social_network }}" id="social_network" placeholder="Ej: https://github.com/user123">
          @error("social_network")
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex">{{-- Botones --}}
          <button type="submit" class="btn btn-primary mr-1">Guardar cambios</button>
          <a href="{{ action('AccountController@show', $account->slug) }}"
            class="btn btn-secondary ml-1 d-flex align-items-center">
            Cancelar
          </a>
        </div>
      </div>
    </div>

  </form>
</div>
@endsection
