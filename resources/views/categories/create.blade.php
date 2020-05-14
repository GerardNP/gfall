@extends("layouts.app")
@section("title", "Crear categoría - GFALL")

@section("content")
<div class="container mt-3">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear categoría</div>

              <div class="card-body">
                  <form action="{{ action('CategoryController@store') }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                            <textarea name="desc" id="desc" class="form-control">{{ old('desc') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="img" class="col-md-4 col-form-label text-md-right">Icono</label>

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
                            <a href="{{ action('CategoryController@index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>

                  </form>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
