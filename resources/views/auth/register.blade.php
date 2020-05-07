@extends('layouts.app')

@section('content')
<h2>Crea tu cuenta</h2>
<form action="{{ route('register') }}" method="post" class="container">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
          <span class="text-danger" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
      <label for="email">Correo</label>
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
        @error('password')
          <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <input type="submit" value="Registrarse" class="btn btn-block btn-primary">
</form>
@endsection
