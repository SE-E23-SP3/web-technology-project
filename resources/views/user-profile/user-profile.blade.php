<x-layouts.base>
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
  </x-slot:head>

  <body>
    <div class="grid">
      <div></div>
      <div class="content">
        <div class="user-info">
          <img class="profile-picture" src="https://fastly.picsum.photos/id/1084/536/354.jpg?grayscale&hmac=Ux7nzg19e1q35mlUVZjhCLxqkR30cC-CarVg-nlIf60" />
          <div class="profile-name-and-date">
            <p class="username">Username</p>
            <p class="member-date">Member since: MM:DD:YYYY</p>
          </div>
        </div>
        <section class="rated-movies-section">
          <p class="rated-movies-header">Rated Movies</p>
          <p class="rated-movies-second-head">Recent ratings</p>
          <div class="rated-movies-list">
            <div class="rated-movie">
              <img class="rated-movie-pic" src="https://picsum.photos/id/237/536/354">
              <p class=" movie-name">The dog movie</p>
              <p class="movie-rating">5/10</p>
            </div>
            <div class="rated-movie">
              <img class="rated-movie-pic" src="https://picsum.photos/id/237/536/354">
              <p class=" movie-name">The dog movie</p>
              <p class="movie-rating">6.9/10</p>
            </div>
          </div>
        </section>
        <div class="watchlist">

        </div>
      </div>
  </body>



</x-layouts.base>