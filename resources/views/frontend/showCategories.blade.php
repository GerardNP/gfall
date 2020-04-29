@extends("layouts.app")

@section("title", "Categorías")

@section("content")
<h1>Categorías</h1>
<ul>
  @foreach( $categories as $category)
    <li>
      <a href="{{ action('FrontController@showCategory', $category->slug) }}">{{ $category->name }}</a>
    </li>
  @endforeach
</ul>

@endsection
