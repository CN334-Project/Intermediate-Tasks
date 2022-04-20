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

    public function test_edit_task()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
            'user_id' => 1,
            'id' => 1,
        ]);
        $task->description = 'test edit';
        $task->save();

        $this->assertDatabaseHas('tasks', ['description' => 'test edit', 'user_id' => 1, 'id' => 1]);
    }

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
        $this->assertDatabaseHas('users', ['name' => $user->name,'email' => $user->email,'password' => $user->password]);
    }

    //Login
    public function test_user_can_login()
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
