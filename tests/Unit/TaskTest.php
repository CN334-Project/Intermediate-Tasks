<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // Task Schema Test
    public function tasks_database_has_expected_columns()
    {
        $this->assertTrue(
          Schema::hasColumns('tasks', [
            'id','description', 'user_id', 'created_at', 'updated_at'
        ]), 1);
    }

    public function test_database_has_user_id_columns()
    {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks',
                'user_id'
            ),
            1
        );
    }

    public function test_database_has_description_columns()
    {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks',
                'description'
            ),
            1
        );
    }

    public function test_database_has_id_columns()
    {
        $this->assertTrue(
            Schema::hasColumn(
                'tasks',
                'id'
            ),
            1
        );
    }

    public function test_create_task_in_database()
    {
        Task::factory()->create([
            'description' => 'test desc',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'test desc']);
    }

    public function test_delete_task_in_database()
    {
        $task = Task::factory()->create();

        $task -> delete();

        $this->assertModelMissing($task);
    }
}
