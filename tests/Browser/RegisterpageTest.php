<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterpageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
    public function testRegister()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('http://localhost:8000/')->pause('1000')
                ->clickLink('註冊')->pause('1000')
                ->assertPathIs('/register')
                ->type('name','林璟1')->pause('1000')
                ->type('email','kirs29850211@gmail.com')->pause('1000')
                ->type('password','password')->pause('1000')
                ->type('password_confirmation','password')->pause('1000')
                ->press('註冊')->pause('1000')
                //->assertSee('歡迎登入林璟1')->pause('2000')
                ->acceptDialog() 
                ->clickLink('長袖')->pause('2000')

            ;
        });
    }
}
