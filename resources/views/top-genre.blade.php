<x-layouts.base title="Top Charts">
    <x-slot:head>
      <link rel="stylesheet" href="{{asset('css/top-rated.css')}}">
      <!--Font awesome icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
    </x-slot:head>
      
    <div class="background">
      <article class="content">
        <section class="top-banner">
          <h1 class="title">Top Charts</h1>
          <p class="sub-title padding-remove">Top 300 rated movies</p>
        </section>
        <section class="sorting-filters">
          <Label class="sort-text">Sort:</Label>
            <select class="sorter" name="genre-picker" id="genre-picker">
                <option value="Default">Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $selectedGenre == $genre->id ? 'selected' : '' }}>
                        {{ $genre->genre_name }}
                    </option>
                @endforeach
        </form>   
        
          <select class="sorter" name="duration-picker" id="duration-picker">
            <option value="Defualt">Duration</option>
            <option value="hour">30m</option>
            <option value="hour-thirty">1h 30m</option>
          </select>
          <a cla href="{{ route('top-charts', ['order' => $currentOrder == 'desc' ? 'asc' : 'desc']) }}">
          <i class="fa-solid fa-right-left arrow-color arrow-reverse"></i>
          </a>
        </section>
  
      @foreach ($topRatedMovies as $movie)
      <article class="movie-container">
          <a class="test" href="{{ url('movie/' . $movie->id) }}">
              <img class="movie-poster" src="{{ asset($movie->poster_url) }}" alt="">
          </a>
          <section class="movie-info">
              <h2 class="movie-title inlined-text padding-remove">{{ $movie->title }}</h2>
              <p class="rating inlined-text padding-remove">
                  {{ number_format($movie->avg_rating, 1) }} <!-- Assuming you want to display the average rating -->
                  <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
              </p>
              <p class="general-info padding-remove">
                  {{ $movie->release_date->format('Y') }} | 
                  {{ $movie->duration }} mins | <!-- Assuming duration is in minutes -->
                  @if ($movie->genres->count() > 1)
                  @for ($i = 0; $i < 2; $i++)
                      {{ $movie->genres[$i]->genre_name }}{{ $i < 1 ? ',' : '' }}
                  @endfor
                  @else
                      {{ $movie->genres->first()->genre_name }}
                  @endif
                  |
              </p>
              <div class="info-separator"></div>
              <p class="actors padding-remove">
                @for ($i = 0; $i < min(4, $movie->crew->count()); $i++)
                {{ $movie->crew[$i]->first_name }}{{ $i < 3 ? ' |' : '' }}
                 @endfor
                 |
              </p>
              <p class="description padding-remove">{{ $movie->description }}</p>
          </section>
      </article>
      @endforeach
  
            <!--PAGINATION-->
            @if ($topRatedMovies->lastPage() > 1)
                <ul class="pagination justify-content-center">
                    @if($topRatedMovies->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $topRatedMovies->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
            
                    @for ($i = 1; $i <= $topRatedMovies->lastPage(); $i++)
                        @if ($i == 1 || $i == $topRatedMovies->lastPage() || ($i >= $topRatedMovies->currentPage() - 2 && $i <= $topRatedMovies->currentPage() + 2))
                            <li class="page-item {{ $i == $topRatedMovies->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ route('top-charts', ['order' => $currentOrder, 'page' => $i]) }}">{{ $i }}</a>
                            </li>
                        @elseif (($i == $topRatedMovies->currentPage() - 3 && $i > 1) || ($i == $topRatedMovies->currentPage() + 3 && $i < $topRatedMovies->lastPage()))
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endfor
            
                    @if($topRatedMovies->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $topRatedMovies->nextPageUrl(['order' => $currentOrder]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </span>
                        </li>
                    @endif
                </ul>
            @endif
      </article>
    </div>
  </x-layouts.base>