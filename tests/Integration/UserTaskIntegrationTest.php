<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;
use Laravel\Jetstream\Features;
use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class UserTaskIntegrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    //Test user cannot create 0 task
    public function test_user_cannot_create_0_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->count(0)->create(['user_id' => $user->id]);
        $this->assertDatabaseMissing('tasks', array($task));
    }

    //Test user can create 1000 task
    public function test_user_can_create_1000_task()
    {
        $user = User::factory()->create();
        Task::factory()->count(1000)->create(['user_id' => $user->id]);
        $this->assertDatabaseHas('tasks', ['user_id' => $user->id]);
    }

    //Test delete user then task should delete together
    public function test_delete_user_and_task_should_delete_together()
    {
        $user = User::factory()->create();
        Task::factory()->count(0)->create(['user_id' => $user->id]);
        $user->delete();
        $this->assertDatabaseMissing('tasks', ['user_id' => $user->id]);
    }

    //Test user edit your own task
    public function test_user_can_edit_own_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'description' => 'test desc',
            'user_id' => $user->id
        ]);
        $task -> description = 'test edit';
        $task -> save();
        $this->assertDatabaseHas('tasks', ['description' => 'test edit','user_id' => $user->id]);
    }

    //Test user create task with same topic name
    public function test_add_task_with_same_topic_name()
    {
        Task::factory()->create([
            'description' => 'test desc',
            'id' => 1,
            'user_id' => 1,
        ]);

        Task::factory()->create([
            'description' => 'test desc',
            'id' => 2,
            'user_id' => 1,
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'test desc', 'id' => 1, 'user_id' => 1,]);
        $this->assertDatabaseHas('tasks', ['description' => 'test desc', 'id' => 2, 'user_id' => 1,]);
    }

}

?>
