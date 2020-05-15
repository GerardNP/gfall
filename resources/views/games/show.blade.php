@extends("layouts.app")
@section("title", $game->title . " - GFALL")

@section("content")
<div class="container my-3">
  <div class="d-flex aling-items-center">
    <img src="{{ asset($game->img) }}" alt="" width="120" height="80" class="rounded-lg mr-3">
    <div class="d-flex flex-column ">
      <span class="h3 font-weight-bold mt-auto mb-0">{{ $game->name }}</span>
      <p class="mb-auto">
        Categoría:
        <a href="">{{ $game->category->name }}</a>
      </p>
      <p class="mb-auto">
        Autor:
        <a href=""></a>
      </p>
    </div>
  </div>
</div>

<section class="container-game" style="background-image: url({{ asset('img/admin/background.png') }})">
  <div class="game container"></div>
</section>

<section class="container my-3">
  <span class="h4">Detalles</span>
  <hr>
  <p>{{ $game->desc }}</p>
</section>
@endsection
