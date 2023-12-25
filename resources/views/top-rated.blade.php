<x-layouts.base title="Top Charts">
  <x-slot:head>
    <link rel="stylesheet" href="{{asset('css/top-rated.css')}}">
    <!--Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://kit.fontawesome.com/c52cf1851a.js" crossorigin="anonymous"></script>
    <script defer src="{{asset('js/reverse-order.js')}}"></script>
  </x-slot:head>
    
  <div class="background">
    <article class="content">
      <section class="top-banner">
        <h1 class="title">Top Charts</h1>
        <p class="sub-title padding-remove">Top 300 Rated Movies Across Genres</p>
      </section>
      <section class="sorting-filters">
        <label class="sort-text">Sort:</label>
        <form class="genre-form" method="GET" action="{{ route('top-charts') }}" id="sorting-form">
          <select class="sorter" name="selectedGenre" id="genre-picker">
            <option value="Default" {{ $selectedGenre == 'Default' ? 'selected' : '' }}>Genres</option>
              @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $selectedGenre == $genre->id ? 'selected' : '' }}>
                    {{ $genre->genre_name }}
                </option>
              @endforeach
          </select>
        
          <input type="hidden" name="order" id="order-input" value="{{ $currentOrder }}">
          <button class="reverse-btn" type="button" onclick="toggleOrder()">
              <i class="fa-solid fa-right-left arrow-color arrow-reverse"></i>
          </button>
        </form>
      </section>

    @foreach ($topRatedMovies as $movie)
    <article class="movie-container">
        <a class="test" href="{{ url('movie/' . $movie->id) }}">
            <img class="movie-poster" src="{{ asset($movie->poster_url) }}" alt="">
        </a>
        <section class="movie-info">
            <h2 class="movie-title inlined-text padding-remove">{{ $movie->title }}</h2>
            <p class="rating inlined-text padding-remove">
                {{ number_format($movie->avg_rating, 1) }} <!-- gets the average rating with 1 decimal -->
                <i class="fa-solid fa-star star" style="color: #e7ba1e;"></i>
            </p>
            <p class="general-info padding-remove">
                {{ $movie->release_date->format('Y') }} | 
                {{ $movie->duration }} mins |
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

              <li class="page-item {{ $topRatedMovies->onFirstPage() ? 'disabled' : '' }}"> <!-- If on the first page the previous page button is disabled --> 
                  <a class="page-link" href="{{ $topRatedMovies->url($topRatedMovies->currentPage() - 1) . '&order=' . $currentOrder . '&selectedGenre=' . $selectedGenre }}" rel="prev" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>

              {{-- Pagination Elements --}}
              @if ($topRatedMovies->currentPage() > 3)
                  <li class="page-item">
                      <a class="page-link" href="{{ $topRatedMovies->url(1) . '&order=' . $currentOrder . '&selectedGenre=' . $selectedGenre }}">1</a>
                  </li>
                  @if ($topRatedMovies->currentPage() > 4)
                      <li class="page-item disabled">
                          <span class="page-link">...</span>
                      </li>
                  @endif
              @endif

              @for ($i = max(1, $topRatedMovies->currentPage() - 2); $i <= min($topRatedMovies->lastPage(), $topRatedMovies->currentPage() + 2); $i++)
                  <li class="page-item {{ $i == $topRatedMovies->currentPage() ? 'active' : '' }}">
                      <a class="page-link" href="{{ $topRatedMovies->url($i) . '&order=' . $currentOrder . '&selectedGenre=' . $selectedGenre }}">{{ $i }}</a>
                  </li>
              @endfor

              @if ($topRatedMovies->currentPage() < $topRatedMovies->lastPage() - 2)
                  @if ($topRatedMovies->currentPage() < $topRatedMovies->lastPage() - 3)
                      <li class="page-item disabled">
                          <span class="page-link">...</span>
                      </li>
                  @endif
                  <li class="page-item">
                      <a class="page-link" href="{{ $topRatedMovies->url($topRatedMovies->lastPage()) . '&order=' . $currentOrder . '&selectedGenre=' . $selectedGenre }}">{{ $topRatedMovies->lastPage() }}</a>
                  </li>
              @endif

              <li class="page-item {{ $topRatedMovies->hasMorePages() ? '' : 'disabled' }}"> <!-- Disables next page button if user is on the last page --> 
                  <a class="page-link" href="{{ $topRatedMovies->nextPageUrl() . '&order=' . $currentOrder . '&selectedGenre=' . $selectedGenre }}" rel="next" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
      @endif
    </article>
  </div>
</x-layouts.base>