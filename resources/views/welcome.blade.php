<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMDB</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">



        <!--Bootrstap CSS and Script link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>

        <!--Font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
        
    </head>

    <body>
        <div class="container-fluid">
                <article class="row align-items-center">
                    <section class="col-2 mx-auto col-md-6 bg-danger">
                        <article class="row">
                            <section class="col p-0">
                                <img src="https://picsum.photos/100/200" alt="..."/>
                            </section>
                            <section class="col-4 text-center my-5">
                                <h3 class="Movie-heading">AAAAA</h3>
                                <p class="Movie-info">Info</p>
                            </section>
                        </article>
                    </section>
                <!---
                    <section class="col-1 offset-1">
                        <button class="btn nextBtn">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </section>
                    <section class="col-8 col-md-6 p-0">
                        <img class="" src="https://picsum.photos/800/254" alt="..." />
                    </section>
                    <section class="col-2 bg-success">
                        <h3>Movie name</h3>
                        <P>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aut modi veritatis porro! Nihil
                            corporis aut odit nostrum quibusdam corrupti facilis architecto ea saepe laborum unde, inventore
                            maiores ipsam natus?
                        </P>
                        <button>Find out more -></button>
                        
                    </section>
                    <section class="col-1">
                        <button class=" btn prevBtn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </section>
                -->
                </article>
        </div>
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
    </body>
</html>
