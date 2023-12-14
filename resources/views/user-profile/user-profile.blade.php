<x-layouts.base>
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
					<p class="username">{{ $username }}</p>
					<p class="member-date">Member since: {{ $memberSince }}</p>
  				</article>
						<a href="https://localhost:8443/user-edit">
								<button class="edit-profile-btn">Edit profile</button>
						</a>
				</section>
        <section class="rated-movies-section">
          <p class="movies-header">Rated Movies</p>
          <p class="movies-second-head">Recent ratings</p>
          <div class="movies-list">
          @foreach($ratedMovies as $movie)
                    <article class="movie">
                        <a href="{{ route('movie.details', ['id' => $movie->id]) }}">
                            <img class="movie-pic" src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">
                        </a>
                        <p class="movie-name">{{ $movie->title }}</p>
                        <p class="movie-rating">
                            {{ $movie->rating }}/10
                            <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
                        </p>
                    </article>
                @endforeach
          </div>
          <div class="see-more">
            <a href="https://localhost:8443/watchlist">see ratings...</a>
          </div>
        </section>

        <section class="watchlist-movies-section">
          <p class="movies-header">Watchlisted Movies</p>
          <p class="movies-second-head">Recently added</p>
          <div class="movies-list">
          @foreach($ratedMovies as $movie)
                    <article class="movie">
                        <a href="{{ route('movie.details', ['id' => $movie->id]) }}">
                            <img class="movie-pic" src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }}">
                        </a>
                        <p class="movie-name">{{ $movie->title }}</p>
                    </article>
                @endforeach
          </div>
          <div class="see-more">
            <a href="https://localhost:8443/wathclist">see watchlist...</a>
          </div>
        </section>
      </div>
</x-layouts.base>