<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Tests\TestCase;


class UserTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    //Schema Test all columns
    public function test_users_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id', 'name', 'email', 'email_verified_at', 'password'
            ]),
            1
        );
    }

    //Schema Test has name column
    public function test_users_database_has_name_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'name'),
            1
        );
    }

    //Schema Test has email column
    public function test_users_database_has_email_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'email'),
            1
        );
    }

    //Schema Test has password column
    public function test_users_database_has_password_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'password'),
            1
        );
    }

    //Test user could create email in database
    public function test_create_user_in_database()
    {
        User::factory()->create([
            'email' => 'Taeshinn@gmail.com',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'Taeshinn@gmail.com']);
    }

    //Test user could create email with thai language in database
    public function test_create_user_with_thai_email_in_database()
    {
        User::factory()->create([
            'email' => 'เต้ชิน@gmail.com',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'เต้ชิน@gmail.com']);
    }

    //Test model is missing when delete it
    public function test_model_is_missing()
    {
        $user = User::factory()->create();
        $user->delete();
        $this->assertModelMissing($user);
    }

    //Test model is exists when creating user model
    public function test_model_is_not_missing()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
    }

}
