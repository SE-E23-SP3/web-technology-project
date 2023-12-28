<x-layouts.base title="your-watchlist">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/watchlist.css') }}">
        <script defer src="{{asset('js/watchlist.js')}}"> </script>
    </x-slot:head>

        <header>
            <h1>Your Watchlist</h1>
        </header>

        <div class="movie-container">
    @php
        $processedMovies = [];
    @endphp

    @foreach($watchlistMovies as $movie)
        @if (!in_array($movie->id, $processedMovies))
            @php
                $processedMovies[] = $movie->id;
            @endphp

            <div class="movie">
                <a href="{{ route('movie-id', ['id' => $movie->id]) }}">
                    <img src="{{ asset($movie->poster_url) }}" alt="Movie Poster">
                </a>
                <div class="movie-details">
                    <div class="movie-name"><a href="{{ route('movie-id', ['id' => $movie->id]) }}">{{ $movie->title }}</a></div>
                    <span>{{ $movie->genre_name }}</span>
                    <span> | </span>
                    <span>{{ $movie->mpa_rating }}</span>
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
        @endif
    @endforeach
</div>

</x-layouts.base>
