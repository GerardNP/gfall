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

    @auth
      @if( $favorite == true )
        <img src="{{ asset('img/admin/favorite.svg') }}" alt="" height="50" id="favorite">
      @else
        <img src="{{ asset('img/admin/no-favorite.svg') }}" alt="" height="50" id="favorite">
      @endif
    @endauth
  </div>
</section>


<section style="background-image: url({{ asset('img/admin/background-game.png') }})"
class="container-game">
  <div class="container" id="game">
    @if ( file_exists("file/games/".$game->id."/index.html") )
      @php echo file_get_contents("file/games/".$game->id."/index.html"); @endphp
    @endif
  </div>

  <?php if ( file_exists("file/games/".$game->id."/styles.css") ) { ?>
    <link rel="stylesheet" href="{{ asset('file/games/'.$game->id.'/styles.css') }}">
  <?php } ?>
  <?php if ( file_exists("file/games/".$game->id."/scripts.js") ) { ?>
    <script src="{{ asset('file/games/'.$game->id.'/scripts.js') }}"></script>
  <?php } ?>

  <script>
    @if( Auth::user() && $game->has_score == true)
    $(document).ready(function() {
      $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content") }
      });

      $("#favorite").click( function() { {{-- Guardar como Favorito --}}
        $.ajax({
          type: "post",
          url:  "{{ action('FavoriteController@save') }}",
          data: {"game": {{ $game->id }}, "account": {{ Auth::user()->account_id }}},
          success: function() {
            location.reload();
          }
        });
      });

      $("#finishGame").click( function() { {{-- Guardar Puntuación --}}
        if ( Number.isInteger(score) ) {
          $.ajax({
            type: "post",
            url: "{{ action('ScoreController@save') }}",
            data: {"score": score, "game": {{ $game->id }}, "account": {{ Auth::user()->account_id }}},
            success: function() {
              alert("Funciona score");
            },
            error: function() {
              alert("No funciona score");
            }
          });
        }
      });
    });
    @endif
  </script>
</section>

@if( Auth::user() && $game->has_score == true)
<section class="container my-3">
  <button type="button" class="btn btn-block btn-outline-secondary" id="finishGame">
    Guardar Puntuación
  </button>
</section>
@endif

<section class="container my-3">
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
</section>


<section class="container mb-3 mt-5">
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

<script>
var asset = "{{asset('file/games/'.$game->id)}}";
</script>
@endsection
