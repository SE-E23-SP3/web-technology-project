(function() {
    const movieImage = document.querySelector("#Movie-img");
    const movieTitle = document.querySelector("#Movie-title");
    const movieInfo = document.querySelector("#Movie-info");
    const buttons = document.querySelectorAll(".btn");

    let index = 0;

    const movies = [];

    function Movie(img, title, text){
        this.img = img;
        this.title = title;
        this.text = text;

    }

    function createMovie(img, name, text){
        let fullImage = img.link("https://picsum.photos/400/200")
        let movie = new Movie(fullImage, name, text);

        movies.push(movie);

    }

    createMovie("https://picsum.photos/400/200", "Oppenheimer", "lorem Ipsum")

    console.log(movies.length);
    //alert(movies.length);








    
    var movie_info = document.getElementsByClassName("Movie-info")

    // Iterate through each paragraph
    for (var i = 0; i < movie_info.length; i++) {
        var movieinfo = movie_info[i];
        
        // Get the text content of the paragraph
        var text = movieinfo.textContent;
    
        // Check if the text is longer than 15 characters
        if (text.length > 200) {
            // Truncate the text to the first 15 characters
            var shortText = text.substring(0, 200) + "...";
    
            // Set the truncated text back to the paragraph
            movieinfo.textContent = shortText;
        }
    }
})();