<x-layouts.base title="Profile">
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/user-profile.js')}}"> </script>
  </x-slot:head>
  
    <div class="background">
      	<div class="content">
      	<section class="user-info">
    		<img class="profile-picture" src="bpp.jpg" />
				<article class="profile-name-and-date">
					<p class="username all-text">{{ $username }}</p>
					<p class="member-date all-text">Member since: {{ $memberSince }}</p>
  				</article>
						<a href="https://localhost:8443/account">
								<button class="edit-profile-btn all-text">Edit profile</button>
						</a>
				</section>
        <section class="movies-list-section">
          	<p class="movies-header all-text">Rated Movies</p>
         	<p class="movies-second-head all-text">Recent ratings</p>
         	<div class="movies-list">
         	@foreach($ratedMovies as $movie)
                    <article class="movie">
                      <a href="{{ route('movie-id', ['id' => $movie->id]) }}">
                            <img class="movie-pic" src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">
                        </a>
                        <p class="movie-name all-text">{{ $movie->title }}</p>
                        <p class="movie-rating all-text">
                            {{ $movie->rating }}/10
                            <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
                        </p>
                    </article>
                @endforeach
          </div>
          <div>
            <a  class="see-more all-text" href="https://localhost:8443/watchlist">see ratings...</a>
          </div>
        </section>

        <section class="movies-list-section">
          <p class="movies-header all-text">Watchlisted Movies</p>
          <p class="movies-second-head all-text">Recently added</p>
          <div class="movies-list">
          @foreach($watchlistMovies as $index => $movie)
    @if($index < 10)
    <article class="movie" data-movie-id="{{ $movie->id }}">
      <a href="{{ route('movie-id', ['id' => $movie->id]) }}">
          <img class="movie-pic" src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">
      </a>
      <!--<button class="remove-from-list-btn" onclick="removeMovie(this)">X</button>-->
      <p class="movie-name all-text">{{ $movie->title }}</p>
  </article>
    @else
        @break
    @endif
@endforeach
          </div>
          <div>
            <a class="see-more all-text" href="https://localhost:8443/wathclist">see watchlist...</a>
          </div>
        </section>
      </div>
</x-layouts.base>