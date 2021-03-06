@extends("layouts.app")
@section("title", "Editar juego - GFALL")

@section("content")
<div class="container mt-3 mb-5">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Editar juego</div>

              <div class="card-body">
                  <form action="{{ action('GameController@update', $game->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form-group row">
                      <label for="category_id" class="col-md-4 col-form-label text-md-right">Categoría</label>

                      <div class="col-md-6">
                        <select name="category_id" id="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                          @foreach($categories as $category)
                            @if($category->id == $game->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                          @endforeach
                        </select>
                        @error("name")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input type="text" name="name" id="name" value="{{ $game->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Descripción</label>

                        <div class="col-md-6">
                            <textarea name="desc" id="desc" class="form-control" rows="5">{{ $game->desc }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                      <span class="col-md-4 col-form-label text-md-right">Destacado</span>

                      <div class="col-md-6 ml-4">
                        <div class="form-check">
                          <input type="radio" name="featured" id="featured-si" value="1" class="form-check-input" @if( $game->featured == true ) checked @endif>
                          <label class="form-check-label" for="featured-si">Sí</label>
                        </div>

                        <div class="form-check">
                          <input type="radio" name="featured" id="featured-no" value="0" class="form-check-input" @if( $game->featured == false ) checked @endif>
                          <label class="form-check-label" for="featured-no">No</label>
                        </div>
                        @error('featured')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <span class="col-md-4 col-form-label text-md-right">Estado</span>

                      <div class="col-md-6 ml-4">
                        <div class="form-check">
                          <input type="radio" name="published" id="published-si" value="1" class="form-check-input" @if( $game->published == true ) checked @endif>
                          <label class="form-check-label" for="published-si">Publicado</label>
                        </div>

                        <div class="form-check">
                          <input type="radio" name="published" id="published-no" value="0" class="form-check-input" @if( $game->published == false ) checked @endif>
                          <label class="form-check-label" for="published-no">En revisión</label>
                        </div>
                        @error('published')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <span class="col-md-4 col-form-label text-md-right">Puntuaciones</span>

                      <div class="col-md-6 ml-4">
                        <div class="form-check">
                          <input type="radio" name="has_score" id="score" value="1" class="form-check-input" @if( $game->has_score == true ) checked @endif>
                          <label class="form-check-label" for="score">Activadas</label>
                        </div>

                        <div class="form-check">
                          <input type="radio" name="has_score" id="notScore" value="0" class="form-check-input" @if( $game->has_score == false ) checked @endif>
                          <label class="form-check-label" for="notScore">Desactivadas</label>
                        </div>
                        @error('has_score')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">{{-- ARCHIVOS --}}
                        <label for="files" class="col-md-4 col-form-label text-md-right">Archivos</label>

                        <div class="col-md-auto">
                            <input type="file" name="files[]" multiple accept=".html,.css,.js" id="files"
                            class="form-control-file @error('files[]') is-invalid @enderror">
                            @error('files[]')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div style="font-size: 80%; color: #dc3545">
                              Solo ficheros HTML (index.html), CSS (styles.css) y JS (scripts.js)
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="img" class="col-md-4 col-form-label text-md-right">Portada</label>

                        <div class="col-md-6">
                            <input type="file" name="img" id="img" accept=".jpeg, .jpg, .png, .bmp, .gif, .svg, .webp" class="form-control-file mb-1 @error('img') is-invalid @enderror">
                            <img src="{{ asset($game->img) }}" alt="" height="150" class="img-fluid">
                            @error('img')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                            <a href="{{ action('GameController@index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                  </form>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
