<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class UserNavigationTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function testAdd_Movie_To_Watchlist(): void
    {
        //Find the user with the id 1
        $user = User::find(1);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user) //Login as the user
            ->visit('/movie/1') //Visit the movie page
            ->assertPathIs('/movie/1') //Assert that the path is /movie/1
            ->clickAndWaitForReload('#addToWatchlist') //Click on the add to watchlist button
            ->visit('/watchlist') //Visit the watchlist page
            ->assertPathIs('/watchlist') //Assert that the path is /watchlist
            ->assertSee('Your Watchlist') //Assert that the page contains the text "Watchlist"
            ->assertSee(DB::table('movies')->where('id', 1)->value('title')); //Assert that the page contains the text of the movie title
        });
    }

    public function testRate_Movie(): void
    {
        //Find the user with the id 1
        $user = User::find(1);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user) //Login as the user
            ->visit('/movie/2') //Visit the movie page
            ->assertPathIs('/movie/2') //Assert that the path is /movie/2
            ->click('#rate') //Click on the add to rate button
            ->waitFor('#ratingModal', 20) //Wait for the rating input to be visible
            ->radio('rating', '5') //Select the rating 5
            ->click('#submitRate') //Click on the rate button
            ->visit('/ratings') //Visit the rating page
            ->assertPathIs('/ratings') //Assert that the path is /ratings
            ->assertSee('Your Ratings') //Assert that the page contains the text "Your Rated Movies"
            ->assertSee(DB::table('movies')->where('id', 2)->value('title')); //Assert that the page contains the text of the movie title
        });
    }

    public function testNavigate_To_Account(): void
    {
        //Find the user with the id 1
        $user = User::find(1);

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user) //Login as the user
            ->visit('/account')
            ->assertPathIs('/account') //Assert that the user is redirected to the login page
            ->assertSee('Edit Profile'); //Assert that the page contains the text "Account"
        });
    }

    public function testNavigate_To_userprofile(): void
    {
        //Find the user with the id 1
        $user = User::find(1);
        
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user) //Login as the user
            ->visit('/user-profile') //Visit the user profile page
            ->assertPathIs('/user-profile') //Assert that the path is /user-profile
            ->assertSee($user->username); //Assert that the page contains the username of the user
        });
    }
}
