//Function for select account type

    function selectAccountType(selectedUser) {
        // Save the selected user type in local storage
        localStorage.setItem('selectedAccount', selectedUser);

        // Change the profile picture based on the selected user
        var profilePic = document.querySelector('.btn.btn-primary img');
        if (selectedUser === 'main') {
            profilePic.src = 'https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png'; // Replace with the path to your main user icon
            profilePic.alt = 'Main User Icon';
        } else {
            profilePic.src = 'bpp.jpg'; // Replace with the path to your child user icon
            profilePic.alt = 'Child User Icon';
        }

        // Update the UI based on the selected account
        updateContentBasedOnAccount(selectedUser);

        // Closes modal
        $('#userModal').modal('hide');
    }


    // On document ready, set the content and profile picture based on the stored account selection
    $(document).ready(function() {
        var selectedAccount = localStorage.getItem('selectedAccount') || 'main';
        selectAccountType(selectedAccount); // This updates the profile picture on page load
    });

    function updateContentBasedOnAccount(selectedUser) {
        // Define the array of kid-friendly genres
        var kidGenres = ['Comedy', 'Family', 'Animation', 'Adventure'];

        // Filter movies based on the selected account
        $('.movie').each(function() {
            var genreText = $(this).find('.movie-info').text();
            var isKidFriendly = kidGenres.some(genre => genreText.includes(genre));

            if (selectedUser === 'subaccount2' && !isKidFriendly) {
                $(this).hide(); // Hide non-kid-friendly movies
            } else {
                $(this).show(); // Show all movies for main account
            }
        });
    }

    // On document ready, set the content based on the stored account selection
    $(document).ready(function() {
        var selectedAccount = localStorage.getItem('selectedAccount') || 'main';
        updateContentBasedOnAccount(selectedAccount);
    });
