<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMDB</title>


    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        body{
            background-color: var(--Background);
            color: var(--Text);
            overflow-x: hidden;
        }
    </style>
</head>-->

<x-layouts.base title="movieinfo">
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/movieinfo.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            body{
    background-color: var(--Background);
    color: var(--Text);
    overflow-x: hidden;
}
        </style>
    </x-slot:head>

    <body>
        <div class="container-fluid">
            <article class="row">
                <section class="col-3 offset-1">
                    <article class="row">
                        <h1>Movie Name</h1>
                        <article class="row">
                            <section class="col-auto">
                                <p>TV Series</p>
                            </section>
                            <section class="col-auto">
                                <p>YEAR</p>
                            </section>
                            <section class="col-auto">
                                <p>02h 43m</p>
                            </section>
                        </article>
                    </article>
                </section>

                <section class="col-auto offset-5">
                    <article class="row">
                        <h6>SMDB RATING</h6>
                    </article>
                    <article class="row">
                        <section class="col-auto">
                            <img src="https://uxwing.com/wp-content/themes/uxwing/download/arts-graphic-shapes/star-symbol-icon.png"
                            style="width: 30px;">
                        </section>
                        <section class="col">
                            <article class="row">
                                <p style="margin-bottom: 0px;">8.5/10</p>
                            </article>
                            <article class="row">
                                <p>90K</p>
                            </article>
                        </section>
                    </article>
                </section>
                <section class="col">
                    <article class="row">
                            <h6>YOUR RATING</h6>
                    </article>
                    <article class="row">
                        <section class="col-auto">
                            <img src="https://cdn-icons-png.flaticon.com/512/9784/9784192.png"
                            style="width: 30px;">
                        </section>
                        <section class="col-auto">
                            <h5 class="rate">Rate</h5>
                        </section>
                    </article>
                </section>
            </article>
        </div>
        
        <div class="container-fluid">
            <article class="row">
                <section class="col-2 offset-1">
                    <img src="https://m.media-amazon.com/images/M/MV5BNjU3N2QxNzYtMjk1NC00MTc4LTk1NTQtMmUxNTljM2I0NDA5XkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_.jpg"
                    class="pic">
                </section>
                <section class="col-5">
                    <img src="https://m.media-amazon.com/images/M/MV5BNGY0ZjA3MzAtYjIwOS00NTk5LThmMzEtNjI0MmU4MzQ1NmRiXkEyXkFqcGdeQWFybm8@._V1_QL75_UY281_CR0,0,500,281_.jpg"
                    class="pic">
                </section>
                <section class="col-3 box">
                    <article class="row">
                        <h3>Video Name</h3>
                    </article>
                    <article class="row">
                        <section class="col align-self-center">
                            <hr>
                            <p>Description</p>
                        </section>
                    </article>
                </section>
            </article>
        </div>

        <div class="container-fluid">
            <article class="row">
                <p></p>
            </article>
            <article class="row">
                <section class="col-7 offset-1">
                    <section class="col box info">
                    <p>MISSING TAGS</p>
                    <p>SummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummarySummary</p>
                    <hr>
                </section>
            </section>
                <section class="col-3 box info">
                        <article class="row">
                            <section class="col-4">
                                <p class="toppad"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/1200px-Picture_icon_BLACK.svg.png" class="pic" style="width: 36px;">
                                    <span>16</span></p>
                            </section>
                            <section class="col-4 offset-3">
                                <p class="toppad"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/1200px-Picture_icon_BLACK.svg.png" class="pic" style="width: 36px;">
                                    <span>1556</span></p>
                            </section>
                        </article>
                        <hr>
                    <table>
                        <tbody>
                          <tr>
                            <td>Seasons:</td>
                            <td>1</td>
                          </tr>
                          <tr>
                            <td>Total episodes:</td>
                            <td>54</td>
                          </tr>
                          <tr>
                            <td>Box:</td>
                            <td>100$</td>
                          </tr>
                        </tbody>
                      </table>
                      <article class="row">
                        <div class="buttonPos">
                            <button type="button">Add to watchlist</button>
                        </div>
                      </article>

                </section>
            </article>
        </div>
    </body>
</x-layouts.base>