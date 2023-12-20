(function() {
    const carouselImage = document.querySelector("#Carousel-img");
    const carouselTitle = document.querySelector("#Carousel-title");
    const carouselInfo = document.querySelector("#Carousel-info");
    const buttons = document.querySelectorAll(".btn");

    let index = 0;

    const items = [];

    function CarouselItem(img, title, text){
        this.img = img;
        this.title = title;
        this.text = text;

    }



fetch('/api/movies')
    .then(response => response.json())
    .then(movies => {
        console.log(movies);

        function CreateItem(img, title, text){
            let item = new CarouselItem(img, title, text);
            items.push(item);
        }

        movies.forEach(movie => {
            console.log(movie.poster_url);
            CreateItem(movie.poster_url, movie.title, movie.description)
        });
        if(items.length > 0){
            carouselImage.src = items[0].img;
            carouselTitle.textContent = items[0].title;
            carouselInfo.textContent = items[0].text;
        }
    })

    buttons.forEach(function(button) {
        //Adds an event to a button by its class
        button.addEventListener("click", function(event){
            //We say if a tag with the class Prev-btn we go back in the array
            if(event.target.parentElement.classList.contains("Prev-btn")){

                if (index === 0 ){
                    index = items.length;
                }
                index--; //Same as writing index = index - 1;
                
                carouselImage.src = items[index].img;
                carouselTitle.textContent = items[index].title;
                carouselInfo.textContent = items[index].text;
            }
            //We say if a tag with the class Next-btn we go forward
            if(event.target.parentElement.classList.contains("Next-btn")){
                index++; //Same as writing index = index + 1;

                if (index === items.length){
                    index = 0;
                }

                carouselImage.src = items[index].img;
                carouselTitle.textContent = items[index].title;
                carouselInfo.textContent = items[index].text;
            }
            
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

        });
    })

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


