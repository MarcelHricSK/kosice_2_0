<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_login_page_returns_a_successful_response()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_page_redirects_after_successful_login()
    {
        $this->get('/login');
        $response = $this->post('/login', ['email' => 'marcelkohric@gmail.com', 'password' => '1234']);

        $response->assertRedirect('/');
        $response->assertSessionHasNoErrors();
    }

    public function test_login_page_shows_error_after_failed_login()
    {
        $this->get('/login');
        $response = $this->post('/login', ['email' => 'marcel@marcelhric.sk', 'password' => '234']);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors();
    }
}
