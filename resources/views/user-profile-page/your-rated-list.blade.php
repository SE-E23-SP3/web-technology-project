<x-layouts.base title="your-ratings">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/watchlist.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
        <script defer src="{{asset('js/watchlist.js')}}"> </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </x-slot:head>
    <body>

        <header>
            <h1>Your Ratings</h1>
        </header>

        <div class="movie-container">
            @foreach($ratedMovies as $movie)
            <div class="movie">
            <a href="{{ route('movie-id', ['id' => $movie->id]) }}">
                <img src="{{ asset($movie->poster_url) }}" alt="Movie Poster">
            </a>
                <div class="movie-details">
                    <div class="movie-name"><a href="{{ route('movie-id', ['id' => $movie->id]) }}">{{ $movie->title }}</a></div>
                    <span>{{ $movie->rating }}                             
                        <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i></span> 
                    <div class="info-separator"></div>
                    <div class="movie-info">
                    <span> Release date: {{$movie->release_date}}</span> <!-- Release date -->
                        <span> | </span>
                        <span> Duration: {{ $movie->duration }}</span> <!-- Duration -->
                        <span> | </span> <br>
                        <span> Description: {{ $movie->description }}</span> <!-- Description --> 
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Movie list -->
            <!-- Add more movies as needed -->
        </div>
    </body>

</x-layouts.base>
