<x-layouts.base>
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
<x-layouts.base>
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
  </x-slot:head>

  <body>
    <div class="background">
      <div class="content">
        <div class="user-info">
          <img class="profile-picture" src="bpp.jpg" />
          <div class="profile-name-and-date">
            <p class="username">Username</p>
            <p class="member-date">Member since: MM:DD:YYYY</p>
          </div>
        </div>
        <section class="rated-movies-section">
          <p class="movies-header">Rated Movies</p>
          <p class="movies-second-head">Recent ratings</p>
          <div class="movies-list">
          <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="{{ asset('THE_DOGGO_MOVIE.png') }}"> </a>
              <p class="movie-name">The Doggo Movie</p>
              <p class="movie-rating">
                12/10
                <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie1</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie2</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie3</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie4</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie5</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie6</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
              <p class="movie-rating">
                6.9/10
                <i class="fa-solid fa-star star"></i>
              </p>
            </div>
          </div>
          <div class="see-more">
            <a href="http://localhost:8000/login">see ratings...</a>
          </div>
        </section>

        <section class="watchlist-movies-section">
          <p class="movies-header">Watchlisted Movies</p>
          <p class="movies-second-head">Recently added</p>
          <div class="movies-list">
          <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="{{ asset('THE_DOGGO_MOVIE.png') }}"> </a>
              <p class="movie-name">The Doggo Movie</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie1</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie2</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie3</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie4</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie5</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie6</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
            </div>
            <div class="movie">
             <a href="http://localhost:8000/login"> <img class="movie-pic" src="https://picsum.photos/id/237/536/354"> </a>
              <p class="movie-name">The dog movie7</p>
            </div>
          </div>
          <div class="see-more">
            <a href="http://localhost:8000/login">see watchlist...</a>
          </div>
        </section>
      </div>

<script>
var movietitels = document.getElementsByClassName("movie-name");

// Iterate through each paragraph
for (var i = 0; i < movietitels.length; i++) {
    var movietitel = movietitels[i];
    
    // Get the text content of the paragraph
    var text = movietitel.textContent;

    // Check if the text is longer than 15 characters
    if (text.length > 15) {
        // Truncate the text to the first 15 characters
        var shortText = text.substring(0, 15) + "...";

        // Set the truncated text back to the paragraph
        movietitel.textContent = shortText;
    }
}
</script>
  </body>
</x-layouts.base>