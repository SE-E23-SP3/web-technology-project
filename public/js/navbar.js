
//Function for select account type

    function selectAccountType(selectedUser) {
        // Save the selected user type in local storage
        localStorage.setItem('selectedAccount', selectedUser);

        // Change the profile picture based on the selected user
        var profilePic = document.querySelector('.btn.btn-primary img');
        if (selectedUser === 'main') {
            profilePic.src = 'https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png'; // Main user icon
            profilePic.alt = 'Main User Icon';
        } else {
            profilePic.src = 'bpp.jpg'; // Child user
            profilePic.alt = 'Child User Icon';
        }

        // Update the UI based on the selected account
        updateContentBasedOnAccount(selectedUser);

        // Closes modal
        $('#userModal').modal('hide');
    }

    
    


    
    $(document).ready(function() {
        var selectedAccount = localStorage.getItem('selectedAccount') || 'main';
        selectAccountType(selectedAccount); // This updates the profile picture on page load
    });

    function updateContentBasedOnAccount(selectedUser) {
        var kidGenres = ['Comedy', 'Adventure', 'Action', 'Fantasy'];
        var kidRatings = ['G', 'PG'];

        // Filter movies on home page

        $(document).ready(function() {
            // Iterate through each movie section
            $(".movie-link").each(function() {
                const $movieSection = $(this);
                const mpaRating = $movieSection.find("span").last().text().trim();
    
                // Compare MPA rating to "G," "PG," or "PG-13" and hide the movie if it's not one of these ratings
                if (mpaRating !== "G" && mpaRating !== "PG" && mpaRating !== "PG-13") {
                    $movieSection.closest(".col-2").hide();
                }
            });
        });

        




        $(document).ready(function() {
            // Function to check if a movie should be hidden based on its genre IDs
                        
            //This is used to remember which genre is which since i cant seem to get into the db and see myself
            // Action id = 1
            // Drama id = 2
            // Comedy id = 3
            // Horror id = 4
            //Romantic id = 5
            //Rom-Com id = 6
            //Fantasy id = 7
            //Sci-Fi id = 8

            //Standard Horror and Drama are not allowed
            function shouldHideMovie(genreIds) {
                return genreIds.includes(2) || genreIds.includes(4);
            }

            // Iterate through each movie section
            $(".movie-link").each(function() {
                const $movieSection = $(this);
                const genreIds = $movieSection.find("span").map(function() {
                    return parseInt($(this).text());
                }).get();
                if(selectedUser === 'subaccount2') {

                if (shouldHideMovie(genreIds)) {
                    $movieSection.closest(".col-2").hide();
                }
            } else {
                $movieSection.closest(".col-2").show(); }
            });
        });

        
    
        // Filter movies on watchlist
        $('.movie').each(function () {
            var genreText = $(this).find('.movie-details span:nth-child(2)').text();
            var ratingText = $(this).find('.movie-details span:nth-child(4)').text().trim();
    
            var isKidFriendlyGenre = kidGenres.some(genre => genreText.includes(genre));
            var isKidFriendlyRating = kidRatings.some(rating => ratingText.includes(rating));
    
            if (selectedUser === 'subaccount2' && (!isKidFriendlyRating || !isKidFriendlyGenre)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    
        // Hide inappropriate genres (h4)
        hideInappropriateGenresForSubaccount(selectedUser, kidGenres);
    }

function hideInappropriateGenresForSubaccount(selectedUser, allowedGenres) {
    if (selectedUser === 'subaccount2') {
        $('article.row.my-2').each(function () {
            var genreName = $(this).find('h4').text();
            if (!allowedGenres.includes(genreName)) {
                $(this).hide();
            }
        });
    } else {
        $('article.row.my-2').show();
    }
}

// On document ready
$(document).ready(function() {
    var selectedAccount = localStorage.getItem('selectedAccount') || 'main';
    selectAccountType(selectedAccount);
    updateContentBasedOnAccount(selectedAccount);
});


