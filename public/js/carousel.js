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

    function createMovie(img, title, text){
        let fullImage = `../img/procedures/${img}.jpg`
        let movie = new Movie(fullImage, title, text);
        movies.push(movie);

    }

    createMovie("1", "Oppenheimer", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    createMovie("2", "Barbie", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    createMovie("3", "Anders", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    createMovie("2", "Nikolaj", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")


    if(movies.length > 0){
        movieImage.src = movies[0].img;
        movieTitle.textContent = movies[0].title;
        movieInfo.textContent = movies[0].text;
    }

    buttons.forEach(function(button) {
        //Adds an event to a button by its class
        button.addEventListener("click", function(event){
            //We say if a tag with the class Prev-btn we go back in the array
            if(event.target.parentElement.classList.contains("Prev-btn")){

                if (index === 0 ){
                    index = movies.length;
                }
                index--; //Same as writing index = index - 1;

                movieImage.src = movies[index].img;
                movieTitle.textContent = movies[index].title;
                movieInfo.textContent = movies[index].text;
            }
            //We say if a tag with the class Next-btn we go forward
            if(event.target.parentElement.classList.contains("Next-btn")){
                index++; //Same as writing index = index + 1;

                if (index === movies.length){
                    index = 0;
                }

                movieImage.src = movies[index].img;
                movieTitle.textContent = movies[index].title;
                movieInfo.textContent = movies[index].text;
            }
        });
    })


    
    var movie_info = document.getElementsByClassName("Movie-info")

    // Iterate through each paragraph
    for (var i = 0; i < movie_info.length; i++) {
        var movieinfo = movie_info[i];
        
        // Get the text content of the paragraph
        var text = movieinfo.textContent;
    
        // Check if the text is longer than 15 characters
        if (text.length > 300) {
            // Truncate the text to the first 15 characters
            var shortText = text.substring(0, 250) + "...";
    
            // Set the truncated text back to the paragraph
            movieinfo.textContent = shortText;
        }
    }
})();