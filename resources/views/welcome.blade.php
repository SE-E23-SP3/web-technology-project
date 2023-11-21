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

</head>

<body>
    <div class="container-fluid">
        <article class="row align-items-center">
            <section class="col-1 offset-2">
                <a href="#" class="btn">
                    <i class="fas fa-chevron-left Prev-btn"></i>
                </a>
            </section>

            <section class="col-4 p-0">
                <img id="Movie-img" src="https://picsum.photos/400/200" alt="..." />
            </section>

            <section class="col-2 text-center my-5">
                <h3 id="Movie-title" class="Movie-heading">Movie title</h3>
                <p id="Movie-info" class="Movie-info">Info</p>
            </section>

            <section class="col-1">
                <a href="#" class="btn">
                    <i class="fas fa-chevron-right Next-btn"></i>
                </a>
            </section>
        </article>
        
        <div class="container">
            <article class="row">
                <h4>Category Name</h4>
                <article class="row">
                    <section class="col-2">
                        <img src="https://picsum.photos/100/200" alt="..." />
                        <P>Movie name</P>
                        <button>
                            <i class="fa-solid fa-play"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2">
                        <img src="https://picsum.photos/100/200" alt="..." />
                        <P>Movie name</P>
                        <button>
                            <i class="fa-solid fa-play"></i>
                            trailer
                        </button>
                    </section>
                    <section class="col-2">
                        <img src="https://picsum.photos/100/200" alt="..." />
                        <P>Movie name</P>
                        <button>
                            <i class="fa-solid fa-play"></i>
                            trailer
                        </button>
                    </section>
                </article>
            </article>

            <article class="row">
                <h4>Category name</h4>

            </article>

        </div>
    </div>

</body>

</html>
