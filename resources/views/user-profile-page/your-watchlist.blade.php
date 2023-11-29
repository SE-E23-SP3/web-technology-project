<x-layouts.base title="your-watchlist">
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/your-watchlist.css') }}">
    </x-slot:head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--Background_Shade);
            color: var(--Text);
        }

        header {
            background-color: var(--Background);
            color: var(--Primary);
            text-align: center;
            padding: 1em;
        }

        .movie-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: var(--Background);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sort-dropdown {
            text-align: center;
            margin-bottom: 20px;
        }

        .movie {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--Background_Shade);
        }

        .movie img {
            max-width: 120px;
            height: 180px;
            margin-right: 20px;
        }

        .movie-details {
            flex-grow: 1;
            text-align: left;
        }

        .movie-name {
            font-weight: bold;
            color: var(--Secondary);
            font-size: 1.2em;
            margin-bottom: 5px;
        }

        .movie-info {
            color: var(--Text_Dim);
            font-size: 0.9em;
            margin-top: 5px;
        }

        .info-separator {
            margin-top: 8px;
            margin-bottom: 8px;
            border-bottom: 1px solid var(--Background_Shade);
        }

        .actor-list,
        .description-text {
            color: var(--Text_Dim);
            font-size: 0.9em;
            margin-top: 5px;
        }

        .movie-rank {
            color: var(--Accent);
            font-size: 1.2em;
        }

        .sort-dropdown select {
            padding: 8px;
            font-size: 1em;
        }
    </style>
<body>

    <header>
        <h1>Your Watchlist</h1>
    </header>

    <div class="movie-container">

        <!-- Sorting dropdown -->
        <div class="sort-dropdown">
            <label for="sort">Sort by:</label>
            <select id="sort" onchange="sortMovies()">
                <option value="custom" selected>Custom</option>
                <option value="rank">Rank</option>
                <option value="name">Name</option>
                <option value="rating">R-Rating</option>
            </select>
        </div>

        <!-- Movie list -->
        <div class="movie">
            <img src="https://api.kino.dk/sites/kino.dk/files/styles/isg_focal_point_356_534/public/2023-10/napoleonplakat.webp?h=7881f276&itok=lqXjeOP6" alt="Movie Poster">
            <div class="movie-details">
                <div class="movie-rank">Rank: 2</div>
                <div class="movie-name">Napoleon</div>
                <div class="info-separator"></div>
                <div class="movie-info">
                    <span>2023</span>
                    <span> | </span>
                    <span>2h 38m</span>
                    <span> | </span>
                    <span>R</span>
                    <span> | </span>
                    <span>History</span>
                </div>
                <div class="actor-list">
                    <span>Joaquin Phoenix</span>
                    <span> | </span>
                    <span>Vanessa Kirby</span>
                    <span> | </span>
                    <span>Tahar Rahim</span>
                    <span> | </span>
                    <span>Ben Miles</span>
                    <span> | </span>
                    <span>Ludivine Sagnier</span>
                    <span></span>
                </div>
                <div class="description-text">
                An epic that details the checkered rise and fall of French Emperor Napoleon Bonaparte and his relentless journey to power through the prism of his addictive, volatile relationship with his wife, Josephine.
                </div>

            </div>
        </div>





        <div class="movie">
            <img src="https://api.kino.dk/sites/kino.dk/files/styles/isg_focal_point_356_534/public/2023-11/barbieplakatny.webp?h=7881f276&itok=fPxVcoa0" alt="Movie Poster">
            <div class="movie-details">
                <div class="movie-rank">Rank: 3</div>
                <div class="movie-name">Barbie</div>
                <div class="info-separator"></div>
                <div class="movie-info">
                    <span>2023</span>
                    <span> | </span>
                    <span>1h 54m</span>
                    <span> | </span>
                    <span>G</span>
                    <span> | </span>
                    <span>Comedy</span>
                </div>
                <div class="actor-list">
                    <span>Ryan Gosling (Literally me)</span>
                    <span> | </span>
                    <span>Margot Robbie</span>
                    <span> | </span>
                    <span>Emma Mackey</span>
                    <span> | </span>
                    <span>Will Ferrel</span>
                    <span> | </span>
                    <span>Simu Liu</span>
                    <span></span>
                </div>
                <div class="description-text">
                    Barbie suffers a crisis that leads her to question her world and her existence.
                </div>

            </div>
        </div>


        <div class="movie">
            <img src="https://api.kino.dk/sites/kino.dk/files/styles/isg_focal_point_242_363/public/2023-09/fivenightsatfreddys_poster.webp?h=7881f276&itok=E02j-Nxp" alt="Movie Poster">
            <div class="movie-details">
                <div class="movie-rank">Rank: 1</div>
                <div class="movie-name">Five Guys In Freddys</div>
                <div class="info-separator"></div>
                <div class="movie-info">
                    <span>2023</span>
                    <span> | </span>
                    <span>2h 22m</span>
                    <span> | </span>
                    <span>PG</span>
                    <span> | </span>
                    <span>Horror</span>
                </div>
                <div class="actor-list">
                    <span>Tom Holland</span>
                    <span> | </span>
                    <span>Freddy FuzzBear</span>
                    <span> | </span>
                    <span>Chicka</span>
                    <span> | </span>
                    <span>Pewdiepie</span>
                    <span> | </span>
                    <span> Patrick </span>
                    <span></span>
                </div>
                <div class="description-text">
                o cholera czy to freddy fazbear euh euh euh euh
                </div>

            </div>
        </div>

        <div class="movie">
            <img src="https://www.scope.dk/shared/1/197/virgin-1984_400x600c.jpg" alt="Movie Poster">
            <div class="movie-details">
                <div class="movie-rank">Rank: 5</div>
                <div class="movie-name">1984</div>
                <div class="info-separator"></div>
                <div class="movie-info">
                    <span>1984</span>
                    <span> | </span>
                    <span>1h 53m</span>
                    <span> | </span>
                    <span>R</span>
                    <span> | </span>
                    <span>Drama/Sci-fi</span>
                </div>
                <div class="actor-list">
                    <span>John Hurt</span>
                    <span> | </span>
                    <span>Richard Burton</span>
                    <span> | </span>
                    <span>Suzanna Hamilton</span>
                    <span> | </span>
                
                    <span></span>
                </div>
                <div class="description-text">
                In a totalitarian future society, a man, whose daily work is re-writing history, tries to rebel by falling in love.
                </div>

            </div>
        </div>

        <div class="movie">
            <img src="https://api.kino.dk/sites/kino.dk/files/styles/isg_focal_point_242_363/public/movie-posters/oppenheimer_-_dansk_plakat.webp?h=7881f276&itok=s9bIHMag" alt="Another Movie Poster">
            <div class="movie-details">
                <div class="movie-rank">Rank: 4</div>
                <div class="movie-name">OppenHeimer</div>
                <div class="info-separator"></div>
                <div class="movie-info">
                    <span>2022</span>
                    <span> | </span>
                    <span>3h </span>
                    <span> | </span>
                    <span>R</span>
                    <span> | </span>
                    <span>History</span>
                </div>
                <div class="actor-list">
                    <span>Cillian Murphy</span>
                    <span> | </span>
                    <span>Florence Pugh</span>
                    <span> | </span>
                    <span>Kenneth Branagh</span>
                    <span> | </span>
                    <span>Gary Oldman</span>
                    <span> | </span>
                    <span>Robert Downey Jr.</span>
                </div>
                <div class="description-text">
                    A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bomb, thus helping end World War 2. We see his life from university days all the way to post-WW2, where his fame saw him embroiled in political machinations.
                </div>
            </div>
        </div>

        <!-- Add more movies as needed -->
    </div>

    <script>
        function sortMovies() {
            var sortSelect = document.getElementById('sort');
            var sortOption = sortSelect.options[sortSelect.selectedIndex].value;
            var movieContainer = document.querySelector('.movie-container');

            var movies = Array.from(movieContainer.querySelectorAll('.movie'));

            if (sortOption === 'rank') {
                // Sort movies by rank
                movies.sort(function (a, b) {
                    var rankA = parseInt(a.querySelector('.movie-rank').textContent.split(' ')[1]);
                    var rankB = parseInt(b.querySelector('.movie-rank').textContent.split(' ')[1]);
                    return rankA - rankB;
                });
            } else if (sortOption === 'name') {
                // Sort movies by name
                movies.sort(function (a, b) {
                    var nameA = a.querySelector('.movie-name').textContent.toLowerCase();
                    var nameB = b.querySelector('.movie-name').textContent.toLowerCase();
                    if (nameA < nameB) return -1;
                    if (nameA > nameB) return 1;
                    return 0;
                });
            } else if (sortOption === 'rating') {
                // Sort movies by R-rating
                movies.sort(function (a, b) {
                    var ratingA = a.querySelector('.movie-info span:nth-child(5)').textContent.toLowerCase();
                    var ratingB = b.querySelector('.movie-info span:nth-child(5)').textContent.toLowerCase();
                    if (ratingA < ratingB) return -1;
                    if (ratingA > ratingB) return 1;
                    return 0;
                });
            }

            // Clear existing movies in the container
            movieContainer.innerHTML = '';

            // Append sorted movies to the container
            movies.forEach(function (movie) {
                movieContainer.appendChild(movie);
            });
        }
    </script>

</body>
</x-layouts.base>
