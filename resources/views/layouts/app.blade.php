<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title") </title>

    <!-- My scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @if( url()->current() == "http://minijuegos.test/game/piedra-papel-tijeras-lagarto-spock" )
    <script src="{{ asset('piedra-papel-tijeras-lagarto-spock/scripts.js') }}" defer></script>
    @endif

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- My styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if( url()->current() == "http://minijuegos.test/game/piedra-papel-tijeras-lagarto-spock" )
    <link href="{{ asset('piedra-papel-tijeras-lagarto-spock/styles.css') }}" rel="stylesheet">
    @endif
  </head>
  <body>
    <!-- NAV -->
    <nav class="navbar bg-dark py-3 justify-align-center">
      <button type="button" class="no-button text-white" id="navbarSidebar">
        <svg class="bi bi-justify" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2 12.5a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
        </svg>
      </button>

      <a href="{{ action('FrontController@index') }}" class=" text-white h3 text-decoration-none">🎮GFALL</a>

      <form class="form-inline">
        <button type="button" class="no-button text-white">
          <svg class="bi bi-search" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
          </svg>
        </button>

        <div class="nav-item dropdown">
          <button type="button" class="no-button text-white nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
            <svg class="bi bi-people-circle" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
              <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
            </svg>
          </button>
          <div class="dropdown-menu">
            @guest
            <a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a>
            <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
            @else
            <a class="dropdown-item" href="">Perfil</a>
            <a class="dropdown-item" href="">Favoritos</a>
            <a class="dropdown-item" href="">Puntuaciones</a>
            <form action="{{ route('logout') }}" method="post" name="formLogout">
              @csrf
              <a class="dropdown-item" href="#" id="logout">Cerrar sesión</a>
            </form>
            @endguest
          </div>
        </div>

      </form>
    </nav>

    <div id="sidebar-menu">
      <a href="{{ action('FrontController@showCategory', 'accion') }}">Acción</a>
      <a href="{{ action('FrontController@showCategory', 'aventura') }}">Aventura</a>
      <a href="{{ action('FrontController@showCategory', 'estrategia') }}">Estrategia</a>
      <a href="{{ action('FrontController@showCategory', 'otro') }}">Otro</a>
    </div>


    <!-- MAIN -->
    <main>
      @yield("content")
    </main>


    <!-- FOOTER -->
    <div class="clear-footer"></div>
    <footer class="bg-dark w-100 py-3">
      <p class="text-center text-white my-0">Todos los derechos reservados. Proyecto Fin de Ciclo.</p>
    </footer>


    <script>
      var asset = "{{ asset('') }}";
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
