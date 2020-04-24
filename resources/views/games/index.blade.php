@extends("layouts.app")

@section("titulo", "Inicio")

@section("main")
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
    </tr>

    @if($games)
      @foreach($games as $game)
      <tr>
        <td>{{$game->id}}</td>
        <td><a href="{{action('GamesController@show', $game->id)}}">{{$game->name}}<a></td>
        <!-- <td><a href="{{route('games.show', $game->id)}}">{{$game->name}}<a></td> -->
      </tr>
      @endforeach
    @endif
  </table>
@endsection
