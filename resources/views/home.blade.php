@extends("layouts.app")
@section("title", "Inicio - GFALL")

@section("content")
<div class="container my-3">

  @if( Session::has("register") )
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Registro completado.</strong>
    Prueba a editar tu
    <a href="{{ action('AccountController@show', Auth::user()->account->slug ) }}">perfil</a>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif


  {{-- CATEGORIES FEATURED  --}}
  @if( !empty($categories[0]) )
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured-categories.png') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">CATEGORÍAS DESTACADAS</span>
    </div>
  </div>

  <hr class="mb-2">

  {{-- <div class="row row-cols-3 row-cols-md-4"> --}}
    {{--@foreach( $categories as $category)
    <div class="col mb-3">
        <img src="{{ asset($category->img) }}" alt="" class="rounded" height="50">
    </div>--}}
    {{-- <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
      <div class="media col border rounded-pill align-items-center py-2">
        <img src="{{ asset($category->img) }}" class="mr-3 rounded" alt="..." height="30">
        <div class="media-body">
          <h6 class="card-title my-0 px-0 mr-1">{{ $category->name }}</h6>
        </div>
      </div>
    </a> --}}
    {{--
    <div class="col mb-4">
      <div class="card rounded-pill">
        <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
          <div class="row justify-content-center align-items-center">
            <img src="{{ asset($category->img) }}" class="col-3 px-0 my-1" alt="" height="30">
            <h6 class="card-title my-0 px-0 col-auto">{{ $category->name }}</h6>
          </div>
        </a>
      </div>
    </div>
    --}}
    {{--@endforeach
  </div>
  @endif--}}
  <div class="row row-cols-2 row-cols-md-4">
   @foreach( $categories as $category)
   <div class="col mb-3">
     <div class="card rounded-pill">
       <a href="{{ action('CategoryController@show', $category->slug) }}" class="text-decoration-none">
         <div class="row justify-content-center align-items-center">
           <img src="{{ asset($category->img) }}" class="col-auto px-0 my-1 rounded" alt="" height="40" style="max-width: 40px;">
           <span class="card-title my-0 px-0 col-auto">
             @php
             echo substr($category->name, 0, 10);
             @endphp
           </span>
         </div>
       </a>
     </div>
   </div>
   @endforeach
 </div>
@endif

  {{-- FEATURED GAMES --}}
  @if( !empty($featuredGames[0]) )
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/featured-games.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS DESTACADOS</span>
    </div>
    <div>
      <a href="{{ action('GameController@showFeatured') }}" class="btn btn-secondary rounded-pill">
        Ver más
      </a>
    </div>
  </div>

  <hr class="mb-2">

  <div class="row row-cols-2 row-cols-md-3">
    @foreach( $featuredGames as $game)
    <div class="col mb-4">
      <div class="card" data-toggle="tooltip" data-placement="right" title="{{ $game->account->user->name }}">
        <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
          <img src="{{ $game->img }}" class="card-img-top" alt="">
          <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
        </a>
      </div>
    </div>
    @endforeach
  </div>
  @endif

  {{-- ALL GAMES --}}
  <div class="media align-items-center mb-1">
    <img src="{{ asset('img/admin/games.svg') }}" alt="" height="40" class="mr-3">
    <div class="media-body">
      <span class="title-section">JUEGOS RECIENTES</span>
    </div>
    @if( !empty($publishedGames[0]) )
      <a href="{{ action('GameController@showAll') }}" class="btn btn-secondary rounded-pill">Ver más</a>
    @endif
  </div>

  <hr class="mb-2">

  @if( empty($publishedGames[0]) )
    Actualmente no hay juegos publicados.
  @else
    <div class="row row-cols-3 row-cols-md-4">
    @foreach( $publishedGames as $game)
    <div class="col mb-4">
      <div class="card" data-toggle="tooltip" data-placement="right" title="{{ $game->account->user->name }}">
        <a href="{{ action('GameController@show', $game->slug) }}" class="text-decoration-none">
          <img src="{{ $game->img }}" class="card-img-top" alt="">
          <h6 class="card-text text-center text-truncate px-1 py-1">{{ $game->name }}</h6>
        </a>
      </div>
    </div>
    @endforeach
    </div>
  @endif

</div>
@endsection
