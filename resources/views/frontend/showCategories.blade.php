@extends("layouts.app")

@section("title", "Categorías")

@section("content")
<h2>Categorías</h2>
<table class="container">
  <tr>
    <th>Nombre</th>
  </tr>
  @foreach( $categories as $category)
    <tr>
      <td><a href="{{ action('FrontController@showCategory', $category->slug) }}">{{ $category->name }}</a></td>
    </tr>
  @endforeach
</table>

@endsection
