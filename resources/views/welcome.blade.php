<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMDB</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">



    <!--Bootrstap CSS and Script link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>

    <script defer src="{{ asset('js/carousel.js') }}"></script>
</head>

<body>
    <main class="container-fluid">
        <article class="row align-items-center Carousel bg mt-5">
            <section class="col-1 offset-2 bg">
                <a href="#" class="btn Prev-btn">
                    <i class="fas fa-chevron-left i-style"></i>
                </a>
            </section>

            <section class="col-4 p-0 bg">
                <img id="Movie-img" src="" alt="..." />
            </section>
            <section class="col-2 text-center bg">
                <h3 id="Movie-title" class="Movie-heading bg"></h3>
                <p id="Movie-info" class="Movie-info bg">
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

</body>

</html>
