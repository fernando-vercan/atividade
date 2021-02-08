<?php

namespace Tests\Unit;

use App\Providers\RouteServiceProvider;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Auth;

class AuthenticationControllerTest extends TestCase
{
    /** @test */
    public function it_redirects_back_to_form_if_login_fails()
    {
        $credentials = [
            'email' => 'teste@teste.com',
            'password' => 'teste',
        ];

        Auth::shouldReceive('attempt')
             ->once()
             ->with($credentials)
             ->andReturn(false);


        $this->call('POST', 'login', $credentials);

        $this->assertRedirectedToRoute('login');
    }

    /** @test */
    public function it_redirects_to_home_page_after_user_logs_in()
    {
        $credentials = [
            'email' => 'teste@teste.com',
            'password' => 'teste123',
        ];

        Auth::shouldReceive('attempt')
             ->once()
             ->with($credentials)
             ->andReturn(true);

        $this->call('POST', 'login', $credentials);

        $this->assertRedirect(RouteServiceProvider::HOME);
    }
}
