<x-layouts.base title="Frontpage">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <script defer src="{{ asset('js/carousel.js') }}"></script>

        <!--Font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>

    </x-slot:head>

    <body>
        <main class="container-fluid">

            <div class="container">
                <article class="row my-2">
                    @isset($categories)
                        <h4>Category names </h4>
                        <article class="row p-0">
                            @for ($i = 0; $i < min(5, count($categories)); $i++)
                                <section class="col-2 bg p-0 mx-2">
                                    <img src="{{ $categories[$i]->poster_url }}" alt="{{ $categories[$i]->title }}"
                                        class="m-2 categoryImg" />
                                    <h6 class="bg mx-2">{{ $categories[$i]->title }}</h6>
                                    <button class="mb-2 mx-2 trailer">
                                        <i class="fa-solid fa-play bg2"></i>
                                        trailer
                                    </button>
                                </section>
                            @endfor
                        </article>
                    @endisset
                </article>

                <article class="row my-2 ">
                    <h4>Category Name</h4>
                    @isset($categories)
                        <h4></h4>
                        <article class="row p-0">
                            @for ($i = 5; $i < min(10, count($categories)); $i++)
                                <section class="col-2 bg p-0 mx-2 mb-5">
                                    <img src="{{$categories[$i]->poster_url }}" alt="{{ $categories[$i]->title }}"
                                        class="m-2 categoryImg" />
                                    <h6 class="bg mx-2">{{$categories[$i]->title}}</h6>
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
