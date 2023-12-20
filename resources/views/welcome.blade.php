<x-layouts.base title="Frontpage">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <!--Font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
        <script defer src="{{ asset('js/shorten-text.js') }}" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </x-slot:head>

    <main class="container-fluid">
        <div class="container">
            @isset($genres)
                @foreach($genres as $genre)
                    <article class="row my-2">
                        <h4>{{ $genre->genre_name }}</h4>
                        <article class="row p-0">
                            @foreach($genre->movies->take(6) as $movie) 
                            <section class="col-2 bg p-0 mx-2">
                                <a href="{{ route('movie-id', ['id' => $movie->id]) }}" class="movie-link">   
                                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="m-2 categoryImg" />
                                    <h6 class="bg mx-2 movie-name">{{ $movie->title }}</h6>
                                </a>
                                </section>
                            @endforeach
                        </article>
                    </article>
                @endforeach
            @endisset
        </div>
    </main> 
</x-layouts.base>
