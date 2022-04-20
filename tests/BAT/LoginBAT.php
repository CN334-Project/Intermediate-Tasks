<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class LoginBAT extends TestCase
{

    use WithFaker, RefreshDatabase;

    //Login
    public function test_login_with_valid_credentials()
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

    public function test_login_with_valid_incredentials()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password,
            'name' => $user->name
        ]);

        $this->assertGuest();
    }

}
?>
