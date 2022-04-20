<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

class EditTaskBAT extends TestCase {

    public function test_edit_description_with_valid_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> edit([
            'description' => 'Hello world',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => 'Hello world']);
    }

    public function test_edit_description_with_invalid_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> edit([
            'description' => '你好世界 操你妈死',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => '你好世界 操你妈死']);
    }

    public function test_edit_description_with_whitespace_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> edit([
            'description' => '',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => '']);
    }

    public function test_edit_description_with_large_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> edit([
            'description' => 'asdoifjapsodihgfpiasudhfgpouashdfpouahsdpifuhaspidufhapisduhfpiasuhdfpiasuhdfpiaushdpfiuhasdipufhapisudhfpiausdhfpiauhsdpfiuhasdpiufghaspdughfpaisudhfgpiaushdgfpiu',
        ]);

        $this->assertDatabaseHas('tasks', ['description' => '']);
    }
}
?>
