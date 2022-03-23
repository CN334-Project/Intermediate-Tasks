<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test  */
    public function Tasks_database_has_expected_columns()
    {
        $this->assertTrue( 
          Schema::hasColumns('tasks', [
            'id','description', 'user_id', 'created_at', 'updated_at'
        ]), 1);
    }

    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'sally@example.com',
        ]);
    }
    
    // public function testBasicTest()
    // {
    //     $this->assertTrue(false);
    // }
}