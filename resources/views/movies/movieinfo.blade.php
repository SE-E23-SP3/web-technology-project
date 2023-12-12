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
                        <h1>{{$movie->title}}</h1>
                        <article class="row">
                            <section class="col-auto">
                                <p>TV Series</p>
                            </section>
                            <section class="col-auto">
                                <p>{{$movie->release_date}}</p>
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
                            <button class="rateButton" data-bs-toggle="modal" data-bs-target="#ratingModal">
                                <article class="row">
                                    <section class="col-auto">
                                        <img src="https://cdn-icons-png.flaticon.com/512/9784/9784192.png"
                                        style="width: 30px;">
                                    </section>
                                    <section class="col-auto">
                                        <h5 class="rate">Rate</h5>
                                    </section>
                                </article>
                            </button>
                        </section>
                    </article>
                </section>
            </article>
        </div>
        
        <div class="container-fluid">
            <article class="row">
                <section class="col-2 offset-1">
                    @isset($movie->poster_url)
                        <img src="{{$movie->poster_url}}" class="pic">  
                    @endisset
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
                        <!--foreach($movie->genres as $genre)
                        <p>{$genre->genre_name}</p>
                        endforeach-->

                        <!--Seems there is no inbetween table-->
                    <p>MISSING TAGS</p>
                    <p>{{$movie->description}}</p>
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

        <!-- Modal -->
<div class="modal fade" id="ratingModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ratingModalLabel">Rating</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
                <fieldset>
                    <div>
                        <input type="radio" id="1star" name="rating" value="1star" />
                        <label for="1star">1</label>

                        <input type="radio" id="2star" name="rating" value="2star" />
                        <label for="2star">2</label>

                        <input type="radio" id="3star" name="rating" value="3star" />
                        <label for="3star">3</label>
                        
                        <input type="radio" id="4star" name="rating" value="4star" />
                        <label for="4star">4</label>

                        <input type="radio" id="5star" name="rating" value="5star" />
                        <label for="5star">5</label>

                        <input type="radio" id="6star" name="rating" value="6star" />
                        <label for="6star">6</label>

                        <input type="radio" id="7star" name="rating" value="7star" />
                        <label for="7star">7</label>
                        
                        <input type="radio" id="8star" name="rating" value="8star" />
                        <label for="8star">8</label>

                        <input type="radio" id="9star" name="rating" value="9star" />
                        <label for="9star">9</label>

                        <input type="radio" id="10star" name="rating" value="10star" />
                        <label for="10star">10</label>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>
    </body>
</x-layouts.base>