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
        <article class="row align-items-center Carousel bg mt-5">
            <section class="col-1 offset-2 bg">
                <a href="#" class="btn Prev-btn">
                    <i class="fas fa-chevron-left i-style"></i>
                </a>
            </section>
            <section class="col-4 p-0 bg">
                <img id="Carousel-img" src="" alt="..." />
            </section>
            <section class="col-2 text-center bg">
                <h3 id="Carousel-title" class="Movie-heading bg"></h3>
                <p id="Carousel-info" class="Movie-info bg">
                </p>
            </section>

            <section class="col-1 bg">
                <a href="#" class="btn Next-btn">
                    <i class="fas fa-chevron-right i-style"></i>
                </a>
            </section>
        </article>

        <div class="container">
            <article class="row mt-2 ">
                <h4>Category Name</h4>
                <article class="row p-0">
                    <section class="col-2 bg p-0 ">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0 mx-2">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0 mx-2">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>


                </article>
            </article>
            <article class="row my-2">
                <h4>Category Name</h4>
                <article class="row p-0">
                    <section class="col-2 bg p-0 ">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0 mx-2">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0 mx-2">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2 bg p-0">
                        <img src="https://picsum.photos/200/200" alt="..." class="m-2" />
                        <h6 class="bg mx-2">Movie name</h6>
                        <button class="mb-2 mx-2 trailer">
                            <i class="fa-solid fa-play bg2"></i>
                            trailer
                        </button>
                    </section>


                </article>
            </article>

        </div>
    </main>
</x-layouts.base>
