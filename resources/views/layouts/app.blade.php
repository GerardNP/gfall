<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield("title") </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @if( url()->current() == "http://minijuegos.test/game/piedra-papel-tijeras-lagarto-spock" )
    <script src="{{ asset('piedra-papel-tijeras-lagarto-spock/scripts.js') }}" defer></script>
    @endif

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if( url()->current() == "http://minijuegos.test/game/piedra-papel-tijeras-lagarto-spock" )
    <link href="{{ asset('piedra-papel-tijeras-lagarto-spock/styles.css') }}" rel="stylesheet">
    @endif
  </head>
  <body>
    <!-- HEADER -->
    <nav>
      <div class="navbar">

        <!-- CATEGORIES -->
        <div class="menu">
          <svg id="button-menu" class="bi bi-justify" width="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
          </svg>
        </div>

        <div class="title">
          <a href="{{action('FrontController@index')}}">🎮minijuegos</a>
        </div>

        <div class="options">
          <!-- SEARCH  -->
          <svg class="bi bi-search" width="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
          </svg>
          <!-- DROPDOWN ACCOUNT -->
          <div class="dropdown">
            @guest
            <svg id="button-account" class="bi bi-people-circle" width="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
              <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
            </svg>
            <div class="dropdown-content" id="content-account">
              <a href="{{ route('login') }}">Iniciar sesión</a>
              <a href="{{ route('register') }}">Registrarse</a>
            </div>
            @else
            <svg id="button-account" class="bi bi-people-circle" width="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
              <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
            </svg>
            <div class="dropdown-content" id="content-account">
              <a href="#">Ver Perfil</a>
              <form action="{{ route('logout') }}" method="post" name="formLogout">
                @csrf
                <a href="#" id="logout">Cerrar sesión</a>
              </form>
            </div>
            @endguest

          </div>
        </div>

      </div>
    </nav>

    <div class="menu-categories" id="menu-categories">
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
    <div class="clear-fix"></div>
    <footer>
      <p>Todos los derechos reservados. Proyecto Fin de Ciclo.</p>
    </footer>

    <script>
      var asset = "{{ asset('') }}";
    </script>
  </body>
</html>
