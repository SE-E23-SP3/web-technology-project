var movietitels = document.getElementsByClassName("movie-name");

// Iterate through each paragraph
for (var i = 0; i < movietitels.length; i++) {
    var movietitel = movietitels[i];
    
    // Get the text content of the paragraph
    var text = movietitel.textContent;

    // Check if the text is longer than 15 characters
    if (text.length > 15) {
        // Truncate the text to the first 15 characters
        var shortText = text.substring(0, 15) + "...";

        // Set the truncated text back to the paragraph
        movietitel.textContent = shortText;
    }
}