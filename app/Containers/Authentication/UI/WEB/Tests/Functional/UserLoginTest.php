<?php

namespace App\Containers\Authentication\UI\WEB\Tests\Functional;

use App\Port\Test\PHPUnit\Abstracts\TestCase;
use App\Port\Test\PHPUnit\Abstracts\WebTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Class UserLoginTest
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class UserLoginTest extends TestCase
{
    use WithoutMiddleware;

    // overrides the default subDomain in the base URL
    protected $subDomain = 'admin';
    protected $endpoint = '/login';

    public function testUserLogin()
    {
        // go to the page
        $this->visit($this->endpoint)
            ->seePageIs($this->endpoint)
            ->see('Login');

        // fill the login form
        $this->type('admin@admin.com', 'email')
            ->type('admin', 'password')
            ->press('Login');

        // login success and redirect to welcome view
        $this->seePageIs('/dashboard')
            ->see('Hello Super Admin');
    }

    public function testLoginWithInvalidCredentials()
    {
        // go to the page
        $this->visit($this->endpoint)
            ->seePageIs($this->endpoint)
            ->see('Login');

        // fill the login form with wrong credentials
        $this->type('foo@foo.com', 'email')
            ->type('foo.123', 'password')
            ->press('Login');

        // we are redirected to the login page and we see errors
        $this->seePageIs($this->endpoint)
            ->see('Credentials Incorrect.');
    }
}
