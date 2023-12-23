<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GuestNavigationTest extends DuskTestCase
{
    public function testNavigate_To_Movie(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/signup')
            ->screenshot('signin_page')  // Take a screenshot of the page.
            ->assertSee('Create new Account');  // Check that the page contains the text "Sign In".
        });
    }
}
