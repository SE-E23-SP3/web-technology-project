var movietitels = document.getElementsByClassName("movie-name");

for (var i = 0; i < movietitels.length; i++) {
    var movietitel = movietitels[i];
    
    var text = movietitel.textContent;

    if (text.length > 15) {
        var shortText = text.substring(0, 15) + "...";

        movietitel.textContent = shortText;
    }
}
