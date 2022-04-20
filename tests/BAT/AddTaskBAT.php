<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;


class AddTaskBAT extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function test_add_task_in_database()
    {
        Task::factory()->create([
            'description' => 'test desc',
            'id' => 1,
            'user_id' => 1,
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'test desc', 'id' => 1, 'user_id' => 1,]);
    }

    public function test_add_description_with_valid_input()
    {
        $task = Task::factory()->create([
            'description' => 'Hello world',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'Hello world']);
    }

    public function test_add_description_with_invalid_input()
    {
        $task = Task::factory()->create([
            'description' => '你好世界 操你妈死',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => '你好世界 操你妈死']);
    }

    public function test_add_description_with_whitespace_input()
    {
        $task = Task::factory()->create([
            'description' => '',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => '']);
    }

    public function test_add_description_with_large_input()
    {
        $task = Task::factory()->create([
            'description' => 'asdoifjapsodihgfpiasudhfgpouashdfpouahsdpifuhaspidufhapisduhfpiasuhdfpiasuhdfpiaushdpfiuhasdipufhapisudhfpiausdhfpiauhsdpfiuhasdpiufghaspdughfpaisudhfgpiaushdgfpiu',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'asdoifjapsodihgfpiasudhfgpouashdfpouahsdpifuhaspidufhapisduhfpiasuhdfpiasuhdfpiaushdpfiuhasdipufhapisudhfpiausdhfpiauhsdpfiuhasdpiufghaspdughfpaisudhfgpiaushdgfpiu']);
    }
}
?>
