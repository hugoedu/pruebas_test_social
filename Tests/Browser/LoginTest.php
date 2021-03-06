<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function usuarios_registrados_se_loguean()
    {
        factory(User::class)->create([
            'email' =>'karolann47@example.net'
        ]);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email','karolann47@example.net')
                ->type('password','secret')
                ->press('#login-btn')
                ->assertAuthenticated()
                ->screenshot("hola_mundo")
            ;
        });
    }
}
