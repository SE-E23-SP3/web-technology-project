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

    function CreateItem(img, title, text){
        let fullImage = `../img/procedures/${img}.jpg`
        let item = new CarouselItem(fullImage, title, text);
        items.push(item);

    }

    CreateItem("1", "Oppenheimer", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    CreateItem("2", "Barbie", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    CreateItem("3", "Anders", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")
    CreateItem("2", "Nikolaj", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text")


    if(items.length > 0){
        carouselImage.src = items[0].img;
        carouselTitle.textContent = items[0].title;
        carouselInfo.textContent = items[0].text;
    }

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


