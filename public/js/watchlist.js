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