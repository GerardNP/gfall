<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title") </title>

    {{-- Optional JavaScript: jQuery first, then Popper.js, then Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {{-- My scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- My styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- My Favicon --}}
    <link rel="icon" href="{{ asset('img/admin/favicon.svg') }}">

    {{-- My Font --}}
    <style media="screen">
      @font-face {
      font-family: adigiana;
      src: url("{{ asset('font/Adigiana.ttf') }}");
      }
    </style>
  </head>
  <body>

    {{-- NAV --}}
    <nav class="navbar bg-dark py-3 justify-align-center">
      <button type="button" class="no-button text-white" id="navbarSidebar">
        <svg class="bi bi-justify" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2 12.5a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
        </svg>
      </button>

      <a href="/" class=" text-white h3 text-decoration-none" style="font-family: adigiana;">
        GFALL
      </a>

      <div class="form-inline">
        <a href="{{ action('SearchController@index') }}" style="color: white">
          <svg class="bi bi-search" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
          </svg>
        </a>

        <div class="nav-item dropdown">
          <button type="button" class="no-button text-white nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
            @guest
            <svg class="bi bi-people-circle" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
              <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
            </svg>
            @else
            <img src="{{ asset(Auth::user()->account->img) }}" alt="" height="32" class="rounded-circle">
            @endguest
          </button>
          <div class="dropdown-menu">
            @guest
            <a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a>
            <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
            @else
            @if(Auth::user()->account->admin)
            <h6 class="dropdown-header">Administración</h6>
            <a class="dropdown-item" href="{{ action('CategoryController@index') }}">Categorías</a>
            <a class="dropdown-item" href="{{ action('GameController@index') }}">Juegos</a>
            <div class="dropdown-divider"></div>
            @endif
            <h6 class="dropdown-header">Cuenta</h6>
            <a class="dropdown-item" href="{{ action('AccountController@show', Auth::user()->account->slug) }}">Perfil</a>
            <a class="dropdown-item" href="{{ action('FavoriteController@show') }}">Favoritos</a>
            <a class="dropdown-item" href="#" id="logout">Cerrar sesión</a>
            <form action="{{ route('logout') }}" method="post" id="logout-form" class="d-none">
              @csrf
            </form>
            @endguest
          </div>
        </div>

      </div>
    </nav>

    <div id="sidebar-menu">
      <div class="d-flex align-items-center head">
        <span class="mx-5">Categorías</span>
        <img src="{{ asset('img/admin/close.svg') }}" alt="" height="25" id="close" class="mt-1">
      </div>
      @if( $auxCategories )
        @foreach( $auxCategories as $auxCategory )
            <a href="{{ action('CategoryController@show', $auxCategory->slug) }}"
              class="d-flex align-items-center flex-no-wrap text-truncate">
              <img src="{{ asset($auxCategory->img) }}" alt="" height="32" class="mr-2 rounded">
              {{ $auxCategory->name }}
            </a>
        @endforeach
      @endif
    </div>


    {{-- MAIN --}}
    <main>
      @yield("content")
    </main>


    {{-- FOOTER --}}
    <div class="clear-footer mt-4"></div>
    <footer class="bg-dark w-100 py-3 px-2 text-break text-white">
      <address class="text-center">
        Contacto: gfall@gmail.com
      </address>
      <p class="text-center my-0">
        Todos los derechos reservados.
        Proyecto Fin de Ciclo.
      </p>
    </footer>

  </body>
</html>
