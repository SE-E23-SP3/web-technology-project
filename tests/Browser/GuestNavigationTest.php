<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Artisan;

class GuestNavigationTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function testCant_Add_Movie_To_Watchlist(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/movie/1')
            ->assertPathIs('/movie/1') //Assert that the path is /movie/1
            ->clickAndWaitForReload('#addToWatchlist') //Click on the add to watchlist button
            ->assertPathIs('/login'); //Assert that the user is redirected to the login page
        });
    }

    public function testCant_Rate_Movie(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/movie/1')
            ->assertPathIs('/movie/1') //Assert that the path is /movie/1
            ->click('#rate') //Click on the add to rate button
            ->waitFor('#ratingModal', 20) //Wait for the rating input to be visible
            ->radio('rating', '5') //Select the rating 5
            ->click('#submitRate') //Click on the rate button
            ->assertPathIs('/login'); //Assert that the user is redirected to the login page
        });
    }

    public function testCant_Navigate_To_Account(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/account')
            ->assertPathIs('/login'); //Assert that the user is redirected to the login page
        });
    }

    public function testCant_Navigate_To_userprofile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user-profile')
            ->assertPathIs('/login'); //Assert that the user is redirected to the login page
        });
    }
}