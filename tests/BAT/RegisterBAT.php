<?php

namespace Tests\BAT;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Tests\TestCase;

class RegisterBAT extends TestCase {

    use WithFaker, RefreshDatabase;

    //Register with non-name input
    public function test_register_with_non_name_input()
    {
        $user = [
            'name' => '',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => '', 'email' => 'testemail@test.com']);
    }

    //Register with non-email input
    public function test_register_with_non_email_input()
    {
        $user = [
            'name' => 'Test',
            'email' => '',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => 'Test', 'email' => '']);
    }

    //Register with non-password input
    public function test_register_with_non_password_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'testemail@test.com',
            'password' => '',
            'password_confirmation' => ''
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => 'Test', 'email' => 'testemail@test.com']);
    }

    //Register with valid name input
    public function test_register_with_valid_name_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseHas('users', ['name' => 'Test', 'email' => 'testemail@test.com']);
    }

    //Register with valid email input
    public function test_register_with_valid_email_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseHas('users', ['name' => 'Test', 'email' => 'testemail@test.com']);
    }

    //Register with valid password input
    public function test_register_with_valid_password_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseHas('users', ['name' => 'Test', 'email' => 'testemail@test.com']);
    }

    //Register with invalid name input
    public function test_register_with_invalid_name_input()
    {
        $user = [
            'name' => '',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => '', 'email' => 'testemail@test.com']);
    }

    //Register with invalid email input
    public function test_register_with_invalid_email_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'wrong-email',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => 'Test', 'email' => 'wrong-email']);
    }

    //Register with invalid password input
    public function test_register_with_invalid_password_input()
    {
        $user = [
            'name' => 'Test',
            'email' => 'testemail@test.com',
            'password' => '123',
            'password_confirmation' => '123'
        ];

        $response = $this->post('/register', $user);

        $this->assertDatabaseMissing('users', ['name' => 'Test', 'email' => 'testemail@test.com']);
    }

}
?>
