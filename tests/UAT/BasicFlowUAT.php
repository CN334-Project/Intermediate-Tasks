<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class BaseFlowUAT extends TestCase {
    //Create Task
    public function test_create_task()
    {
        Task::factory()->create([
            'description' => 'test desc',
            'user_id' => 1,
            'id' => 1,
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'test desc']);
    }

    //Edit Task

    //Delete Task

    //Register

    //Login

}
?>
