@extends('layouts.app')

@section('content')
<h2>Iniciar sesión</h2>
<form class="container" action="{{ route('login') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="email">Correo</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" required autocomplete="email" autofocus>
    @error('email')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" name="password" class="form-control" value="{{ old('password') }}" id="password" required autocomplete="email" autofocus>
    @error('password')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <input type="submit" name="login" value="Iniciar sesión" class="btn btn-block btn-primary">
</form>
@endsection
