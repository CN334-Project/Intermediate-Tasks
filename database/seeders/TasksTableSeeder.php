<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     "description"=> "Ez",
        //     "user_id" => 1
        // ]);

        //Create Task Seeder
        Task::create([
            "description"=> "Ez",
            "user_id" => 10
        ]);
    }
}
