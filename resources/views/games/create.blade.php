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
                    <input type="hidden" name="account_id" value="{{ $account->id }}">

                    <div class="form-group row">
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

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Descripción</label>

                        <div class="col-md-6">
                            <textarea rows="5" name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="img" class="col-md-4 col-form-label text-md-right">Portada</label>

                        <div class="col-md-6">
                            <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror">
                            @error('img')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
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
