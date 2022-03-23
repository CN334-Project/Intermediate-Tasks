<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    //Schema Test all columns
    public function test_users_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('users', [
            'id','name', 'email', 'email_verified_at', 'password'
        ]), 1);
    }

    //Schema Test has name column
    public function test_users_database_has_name_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'name'),1
        );
    }

    //Schema Test has email column
    public function test_users_database_has_email_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'email'),1
        );
    }

    //Schema Test has password column
    public function test_users_database_has_password_column()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'password'),1
        );
    }

    //Test name value is null
    public function test_users_name_is_null()
    {
        # code...
    }
}
