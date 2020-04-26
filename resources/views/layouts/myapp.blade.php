<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield("titulo")</title>

    <style>
      * {
        margin: 0;
        padding: 0;
      }


      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }


      header {
        margin-bottom: 1em;
        padding: 1em 2em;
        background-color: #2f3237;
      }

      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .header a {
        text-decoration: none;
        color: white;
      }

      .title a {
        font-size: 2em;
      }

      .options a {
        padding: 0 0.5em;
      }


      footer {
        width: 100%;
        margin-top: 1em;
        padding: 1em 0;
        position: fixed;
        bottom: 0;
        text-align: center;
        background-color: #2f3237;
        color: white;
      }
    </style>
  </head>
  <body>
    <header>
      <div class="header">

        <div class="menu">
          <a href="#">
            <svg class="bi bi-justify" width="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2 12.5a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
            </svg>
          </a>
        </div>

        <div class="title">
          <a href="{{action('GamesController@index')}}">🎮minijuegos</a>
        </div>

        <div class="options">
          <a href="#">
            <svg class="bi bi-search" width="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
            </svg>
          </a>
          <a href="#">
            <svg class="bi bi-people-circle" width="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
              <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
            </svg>
          </a>
        </div>

      </div>
    </header>


    <main class="container">
      @yield("main")
    </main>


    <footer>
      Todos los derechos reservados. Proyecto Fin de Ciclo.
    </footer>
  </body>
</html>
