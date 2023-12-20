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
        // Define the array of kid-friendly genres
        var kidGenres = ['Comedy', 'Family', 'Animation', 'Adventure'];
    
        // Definition of kid-friendly ratings
        var kidRatings = ['G', 'PG'];
    
        // Filter movies based on the selected account
        $('.movie').each(function() {
            var genreText = $(this).find('.movie-info').text();
            var ratingText = $(this).find('.movie-info').text();
            var isKidFriendlyGenre = kidGenres.some(genre => genreText.includes(genre));
            var isKidFriendlyRating = kidRatings.some(rating => ratingText.includes(rating));
            var isPG13Rating = ratingText.includes('PG-13'); // PG-13 bypassed, so needed to make this hard-coded
    
            if (selectedUser === 'subaccount2' && (!isKidFriendlyRating || isPG13Rating)) {
                $(this).hide(); // Hide non-kid-friendly or PG-13 movies
            } else {
                $(this).show(); // Show all movies for main account or kid-friendly movies for subaccount2
            }
        });
    }

    // On document ready, set the content based on the stored account selection
    $(document).ready(function() {
        var selectedAccount = localStorage.getItem('selectedAccount') || 'main';
        updateContentBasedOnAccount(selectedAccount);
    });
