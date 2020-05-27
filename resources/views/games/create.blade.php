@extends("layouts.app")
@section("title", "Crear juego - GFALL")

@section("content")
<div class="container mt-3 mb-5">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear juego</div>

              <div class="card-body">
                  <form action="{{ action('GameController@store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="account_id" value="{{ $user->account->id }}">


                    <div class="form-group row">{{-- CATEGORÍA --}}
                      <label for="category_id" class="col-md-4 col-form-label text-md-right">Categoría</label>

                      <div class="col-md-6">
                        <select name="category_id" id="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                          <option selected disabled value="">Selecciona una categoría</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @error("category_id")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>


                    <div class="form-group row">{{-- NOMBRE --}}
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">{{-- DESC --}}
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Descripción</label>

                        <div class="col-md-6">
                            <textarea rows="5" name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">{{-- PORTADA --}}
                        <label for="img" class="col-md-4 col-form-label text-md-right">Portada</label>

                        <div class="col-md-6">
                            <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror">
                            @error('img')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">{{-- ARCHIVOS --}}
                        <label for="files" class="col-md-4 col-form-label text-md-right">Archivos</label>

                        <div class="col-md-auto">
                            <input type="file" name="files[]" multiple accept=".html,.css,.js" id="files"
                            class="form-control-file @error('files') is-invalid @enderror">
                            @error('files')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">{{-- PUNTUACIONES --}}
                      <span class="col-md-4 col-form-label text-md-right">Puntuaciones</span>

                      <div class="col-md-6 ml-4">
                        <div class="form-check">
                          <input type="radio" name="has_score" id="score" value="1" class="form-check-input">
                          <label class="form-check-label" for="score">Activar</label>
                        </div>

                        <div class="form-check">
                          <input type="radio" name="has_score" id="notScore" value="0" class="form-check-input">
                          <label class="form-check-label" for="notScore">Desactivar</label>
                        </div>
                        @error('has_score')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>


                    <div class="form-group row mb-0">{{-- BOTONES --}}
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                            <a href="{{ action('AccountController@show', Auth::user()->account->slug ) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                  </form>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
