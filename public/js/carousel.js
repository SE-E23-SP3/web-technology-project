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
    alert(movies.length);
})();