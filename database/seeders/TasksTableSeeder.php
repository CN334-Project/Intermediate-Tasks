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
        User::create([
            "id" => 1,
            "name" => "Tae",
            "email" => "tae@mail.com",
            "password" => "password"
        ]);

        User::create([
            "id" => 2,
            "name" => "Man",
            "email" => "man@mail.com",
            "password" => "password"
        ]);

        User::create([
            "id" => 3,
            "name" => "Dome",
            "email" => "dome@mail.com",
            "password" => "password"
        ]);

        //Create Task Seeder
        Task::create([
            "description"=> "tae's task",
            "user_id" => 1
        ]);

        Task::create([
            "description"=> "man's task",
            "user_id" => 2
        ]);

        Task::create([
            "description"=> "dome's task",
            "user_id" => 3
        ]);
    }
}
