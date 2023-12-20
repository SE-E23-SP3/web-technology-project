<x-layouts.base title="movieinfo">
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/movieinfo.css')}}">
    </x-slot:head>

        <p></p>
        <div class="container-fluid">
            <article class="row">
                <section class="col-3 offset-1">
                    <article class="row">
                        <h1>{{$movie->title}}</h1>
                        <article class="row">
                            <section class="col-auto">
                                <p>Movie</p>
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
                            style="width: 45px;">
                        </section>
                        <section class="col">
                            <article class="row">
                                <p class="ratingP">{{number_format($movie->ratings->avg('movie_rating.rating'), 1)}}/10</p>
                            </article>
                            <article class="row">
                                <p class="ratingP">{{$movie->ratings->count() }}</p>
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
                                        style="width: 45px;">
                                    </section>
                                    <section class="col-auto ratingP">
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
                <section class="col-3 offset-1">
                    @isset($movie->poster_url)
                        <img src="{{$movie->poster_url}}" class="pic">  
                    @endisset
                </section>
                <section class="col-7">
                    @if($movie->trailers->first() != NULL)
                        <iframe class="trailer"
                            src="{{ $movie->trailers->first()->video_url }}" allowfullscreen>
                        </iframe>
                        @else
                            <p>No trailer available</p>
                    @endif
                </section>

            </article>
        </div>

        <div class="container-fluid">
            <article class="row">
                <p></p>
            </article>
            <article class="row">
                <section class="col-10 offset-1">
                    <section class="col box info">
                    <article class="row">
                        @foreach($movie->genres as $genre)
                        <section class="genre">
                            <p class="genreP">{{$genre->genre_name}}</p>
                        </section>
                        @endforeach
                    </article>
                    <hr>    
                    <p>{{$movie->description}}</p>
                    <hr>
                    
                    <div class="buttonPos">
                        <form action="{{ route('watchlist.add', $movie->id) }}" method="POST">
                            @csrf
                            <button type="submit">Add to watchlist</button>
                        </form>
                    </div>
                    @error('error')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </section>
            </section>
            </article>
        </div>

        <div class="container-fluid">
            <article class="row">
                <p></p>
            </article>
            <article class="row">
                <section class="col-10 offset-1">
                    <section class="col box info">
                        <h3>Cast</h3>
                        <article class="row flex">
                            @foreach($movie->roles as $person)
                            <section class="col-2 actor">
                                <p>{{$person->first_name}} {{$person->last_name}}</p>
                                <p>Role: {{$person->movie_cast->role}}</p>
                            </section>
                        @endforeach
                        </article>
                    <hr>
                        <h3>Crew</h3>
                        <article class="row flex">
                            @foreach($movie->crew as $person)
                                <section class="col-2 actor">
                                    <p>{{$person->first_name}} {{$person->last_name}}</p>
                                    <p>Crew type: {{$person->movie_crew->crew_type_id}}</p>
                                </section>
                            @endforeach
                        </article>
                </section>
            </section>
            </article>
            <p></p>
        </div>

        <!-- Modal -->
<div class="modal fade" id="ratingModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ratingModalLabel">Rating</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="rateForm" action="{{ route('movies.rate', $movie->id) }}" method="POST">
        @csrf
        <div class="modal-body">
                <fieldset>
                    <div>
                        <input type="radio" id="1star" name="rating" value="1" required/>
                        <label for="1star">1</label>

                        <input type="radio" id="2star" name="rating" value="2" required/>
                        <label for="2star">2</label>

                        <input type="radio" id="3star" name="rating" value="3" required/>
                        <label for="3star">3</label>
                        
                        <input type="radio" id="4star" name="rating" value="4" required/>
                        <label for="4star">4</label>

                        <input type="radio" id="5star" name="rating" value="5" required/>
                        <label for="5star">5</label>

                        <input type="radio" id="6star" name="rating" value="6" required/>
                        <label for="6star">6</label>

                        <input type="radio" id="7star" name="rating" value="7" required/>
                        <label for="7star">7</label>
                        
                        <input type="radio" id="8star" name="rating" value="8" required/>
                        <label for="8star">8</label>

                        <input type="radio" id="9star" name="rating" value="9" required/>
                        <label for="9star">9</label>

                        <input type="radio" id="10star" name="rating" value="10" required/>
                        <label for="10star">10</label>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" form="rateForm" value="Rate">Rate</button>
            </div>
        </form>
    </div>
  </div>
</div>
</x-layouts.base>