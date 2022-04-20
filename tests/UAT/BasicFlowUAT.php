<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class BaseFlowUAT extends TestCase

{
    use RefreshDatabase, WithFaker;

    //Create Task
    public function test_create_task()
    {
        Task::factory()->create([
            'description' => 'test desc',
            'user_id' => 1,
            'id' => 1,
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'test desc', 'user_id' => 1, 'id' => 1]);
    }

    //Edit Task

    //Delete Task
    public function test_delete_task_in_database()
    {
        $task = Task::factory()->create();
        $task->delete();
        $this->assertModelMissing($task);
    }

    //Register
    public function test_user_can_register()
    {
        $user = User::factory()->create();
        // error_log($user);
        $this->assertTrue(true);
    }

    //Login

}
