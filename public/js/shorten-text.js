var movietitels = document.getElementsByClassName("movie-name");

// go through all movie titels
for (var i = 0; i < movietitels.length; i++) {
    var movietitel = movietitels[i];
    
    // Getting the titel
    var text = movietitel.textContent;

    // Checks if titel is longer than 20 characters
    if (text.length > 20) {
        // Shortens the text
        var shortText = text.substring(0, 20) + "...";

        // Sets the new titel as the titel
        movietitel.textContent = shortText;
    }
}