@extends("layouts.app")
@section("title", $game->name . " - GFALL")

@section("content")
<section style="background-image: url({{ asset('img/admin/background-header-section.webp') }});"
class="py-3 background-center">
  <div class="media align-items-center container ">
    <img src="{{ asset($game->img) }}" alt="" height="80" class="rounded mr-3 " style="max-width: 150px">

    <div class="media-body align-items-center text-break" style="color: var(--white);">
      <span style="font-size: 25px;" class="d-block">{{ $game->name }}</span>
      <span style="font-size: 20px;">
        <a href="{{ action('GameController@showAll') }}" class="text-decoration-none font-weight-light"
        style="color: var(--white);">
          Juegos
        </a>
        /
        <span class="font-weight-bolder">
          <a href="{{ action('CategoryController@show', $game->category->slug) }}" class="text-decoration-none"
            style="color: var(--white);">
            {{ $game->category->name }}
          </a>
        </span>
      </span>
    </div>
  </div>
</section>

<section style="background-image: url({{ asset('img/admin/background-game.png') }})"
class="container-game">
  <div class="game container">
    @if( Auth::user() && $game->has_score == true)
    <button type="button" name="button" id="finishGame"> Terminar juego</button>
    @endif
  </div>
  <script>
    var score = 3;

    @if( Auth::user() && $game->has_score == true)
    $(document).ready(function() {
      $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content") }
      });

      $("#finishGame").click( function() {
        $.ajax({
          type: "post",
          url: "{{ action('ScoreController@save') }}",
          data: {"score": score, "game": {{ $game->id }}, "account": {{ Auth::user()->account_id }}},
          success: function() {
            alert("Funciona");
          },
          error: function() {
            alert("No funciona");
          }
        });
      });
    });
    @endif
  </script>
</section>


<section class="container mt-3 mb-5">
  @if( $game->has_score == true )
  <div class="row my-3">
    <div class="col-6">
      <a href="{{ action('ScoreController@showGame', $game->slug) }}" class="btn btn-block btn-secondary">
        <img src="{{ asset('img/admin/scores.svg') }}" alt="" height="50">
        <span class="d-block">Puntuaciones</span>
      </a>
    </div>

    <div class="col-6">
      <a href="{{ action('AccountController@show', $game->account->slug) }}" class="btn btn-block btn-secondary">
        <img src="{{ asset($game->account->img) }}" alt="" height="50" class="rounded-circle">
        <span class="d-block text-break">{{$game->account->user->name}}</span>
      </a>
    </div>
  </div>
  @else
  <a href="{{ action('AccountController@show', $game->account->slug) }}" class="btn btn-block btn-secondary my-3">
    <img src="{{ asset($game->account->img) }}" alt="" height="50" class="rounded-circle">
    <span class="d-block text-break">{{$game->account->user->name}}</span>
  </a>
  @endif


  @if( !empty($game->desc) )
  <span class="h4">Detalles</span>
  <hr class="mb-2">
  <p>{{ $game->desc }}</p>
  @endif


  <div id="disqus_thread"></div>
  <script>
  {{-- RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables --}}
  var disqus_config = function () {
    this.page.url = "{{ Request::url() }}";{{-- Replace PAGE_URL with your page's canonical URL variable --}}
    this.page.identifier = "{{ $game->title }}"; {{-- Replace PAGE_IDENTIFIER with your page's unique identifier variable --}}
  };

  (function() { {{-- DON'T EDIT BELOW THIS LINE --}}
    var d = document, s = d.createElement('script');
    s.src = 'https://gfall-20.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</section>
@endsection
