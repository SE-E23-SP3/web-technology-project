<x-layouts.base title="Frontpage">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        

        <!--Font awesome icons -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/watchlist.css') }}">
        <script defer src="{{ asset('js/watchlist.js') }}"></script>
        <script defer src="{{ asset('public/js/navbar.js') }}"></script>

    </x-slot:head>

    <body>

        <main class="container-fluid">
            <div class="container">
            <div class="row my-2">
                @isset($categories)
                    <h4>Category names</h4>
                    <div class="row p-0">
                        @foreach ($categories->take(5) as $category)
                            <div class="col-2 bg p-0 mx-2">
                                <img src="{{ $category->poster_url }}" alt="{{ $category->title }}" class="m-2 categoryImg" />
                                <h6 class="bg mx-2">{{ $category->title }}</h6>
                                <h6 class="bg mx-2">{{ $category->mpa_rating }}</h6>
                                <button class="mb-2 mx-2 trailer">
                                    <i class="fa-solid fa-play bg2"></i>
                                    trailer
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endisset
            </div>

                <article class="row my-2 ">
                    <h4>Category Name</h4>
                    @isset($categories)
                        <h4></h4>
                        <article class="row p-0">
                            @for ($i = 5; $i < min(10, count($categories)); $i++)
                                <section class="col-2 bg p-0 mx-2 mb-5">
                                    <img src="{{ $categories[$i]->poster_url }}" alt="{{ $categories[$i]->title }}"
                                        class="m-2 categoryImg" />
                                    <h6 class="bg mx-2">{{ $categories[$i]->title }}</h6>
                                    <h6 class="bg mx-2">{{ $categories[$i]->mpa_rating }}</h6>
                                    <button class="mb-2 mx-2 trailer">
                                        <i class="fa-solid fa-play bg2"></i>
                                        trailer
                                    </button>
                                </section>
                            @endfor
                        </article>
                    @endisset
                </article>
            </div>
        </main>
</x-layouts.base>
