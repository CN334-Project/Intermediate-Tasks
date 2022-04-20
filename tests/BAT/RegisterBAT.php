<?php

namespace Tests\BAT;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Tests\TestCase;

class RegisterBAT extends TestCase {

    use WithFaker, RefreshDatabase;

    //Register with non-email input
    public function test_register_with_non_email_input()
    {
        User::factory()->create([
            'email' => '',
        ]);

        $this->assertDatabaseHas('users', ['email' => '']);
    }

    //Register with non-password input
    public function test_register_with_non_password_input()
    {
        User::factory()->create([
            'password' => '',
        ]);

        $this->assertDatabaseHas('users', ['password' => '']);
    }

    //Register with non-name input

    //Register with valid email input

    //Register with valid password input

    //Register with valid name input

    //Register with invalid email input

    //Register with invalid password input

    //Register with invalid name input


}
?>
