<x-layouts.base>
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/user-profile.js')}}"> </script>
  </x-slot:head>

  <body>
    <div class="background">
      <div class="content">
        <section class="user-info">
          <img class="profile-picture" src="bpp.jpg" />
          <article class="profile-name-and-date">
            <p class="username">Username</p>
            <p class="member-date">Member since: MM:DD:YYYY</p>
          </article>
        </section>
        <section class="rated-movies-section">
          <p class="movies-header">Rated Movies</p>
          <p class="movies-second-head">Recent ratings</p>
          <div class="movies-list">
          <article class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="{{ asset('THE_DOGGO_MOVIE.png') }}"> </a>
              <p class="movie-name">The Doggo Movie long titel</p>
              <p class="movie-rating">
                12/10
                <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
              </p>
            </article>
          </div>
          <div class="see-more">
            <a href="http://localhost:8000/watchlist">see ratings...</a>
          </div>
        </section>

        <section class="watchlist-movies-section">
          <p class="movies-header">Watchlisted Movies</p>
          <p class="movies-second-head">Recently added</p>
          <div class="movies-list">
          
          </div>
          <div class="see-more">
            <a href="http://localhost:8000/watchlist">see watchlist...</a>
          </div>
        </section>
      </div>
  </body>
</x-layouts.base>