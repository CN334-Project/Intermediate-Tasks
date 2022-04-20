<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class LoginBAT extends TestCase
{

    use WithFaker, RefreshDatabase;

    //Login
    public function test_login_with_invalid_credentials()
    {

        $user = User::factory()->create([
            'email' => '',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password,
            'name' => $user->name
        ]);

        $this->assertGuest();
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

}
?>
