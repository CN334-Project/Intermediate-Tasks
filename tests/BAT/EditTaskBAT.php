<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

class EditTaskBAT extends TestCase {

    use RefreshDatabase, WithFaker;

    public function test_edit_description_with_valid_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> description = 'Hello world';
        $task -> save();

        $this->assertDatabaseHas('tasks', ['description' => 'Hello world']);
    }

    public function test_edit_description_with_invalid_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> description = '你好世界 操你妈死';
        $task -> save();

        $this->assertDatabaseHas('tasks', ['description' => '你好世界 操你妈死']);
    }

    public function test_edit_description_with_whitespace_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> description = '';
        $task -> save();

        $this->assertDatabaseHas('tasks', ['description' => '']);
    }

    public function test_edit_description_with_large_input()
    {
        $task = Task::factory()->create([
            'description' => 'test desc',
        ]);

        $task -> description = 'asdoifjapsodihgfpiasudhfgpouashdfpouahsdpifuhaspidufhapisduhfpiasuhdfpiasuhdfpiaushdpfiuhasdipufhapisudhfpiausdhfpiauhsdpfiuhasdpiufghaspdughfpaisudhfgpiaushdgfpiu';
        $task -> save();

        $this->assertDatabaseHas('tasks', ['description' => 'asdoifjapsodihgfpiasudhfgpouashdfpouahsdpifuhaspidufhapisduhfpiasuhdfpiasuhdfpiaushdpfiuhasdipufhapisudhfpiausdhfpiauhsdpfiuhasdpiufghaspdughfpaisudhfgpiaushdgfpiu']);
    }
}
?>
