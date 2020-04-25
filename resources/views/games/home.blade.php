@extends("layouts.app")

@section("titulo", "Inicio")

@section("main")
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Título</th>
    </tr>

    @if($games)
      @foreach($games as $game)
      <tr>
        <td>{{$game->id}}</td>
        <td>{{$game->name}}<a></td>
        <td><a href="{{action('GamesController@show', $game->name)}}">{{$game->title}}<a></td>
      </tr>
      @endforeach
    @endif
  </table>
@endsection
