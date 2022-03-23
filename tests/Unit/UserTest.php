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
    public function users_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('users', [
            'id','name', 'email', 'email_verified_at', 'password'
        ]), 1);
    }

    public function stupidfuck()
    {
        $this->assertTrue(
            Schema::hasColumn('users', 'name'),1
        );
    }

    public function kuy()
    {
        $this->assertTrue(false);
    }

    // public function users_database_has_email_column()
    // {
    //     $this->assertTrue(
    //         Schema::hasColumn('users', 'email'),1
    //     );
    // }
}
