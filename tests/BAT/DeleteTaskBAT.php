<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use App\Models\Task;

class DeleteTaskBAT extends TestCase {

    public function test_delete_task_in_database()
    {
        $task = Task::factory()->create();
        $task -> delete();
        $this->assertModelMissing($task);
    }
}
?>
