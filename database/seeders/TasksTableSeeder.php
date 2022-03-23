<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create User
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

        //Create Task for each User
        Task::create([
            "description"=> "tae's task1",
            "user_id" => 1
        ]);

        Task::create([
            "description"=> "tae's task2",
            "user_id" => 1
        ]);

        Task::create([
            "description"=> "tae's task3",
            "user_id" => 1
        ]);

        Task::create([
            "description"=> "man's task1",
            "user_id" => 2
        ]);

        Task::create([
            "description"=> "man's task2",
            "user_id" => 2
        ]);

        Task::create([
            "description"=> "man's task3",
            "user_id" => 2
        ]);

        Task::create([
            "description"=> "dome's task1",
            "user_id" => 3
        ]);

        Task::create([
            "description"=> "dome's task2",
            "user_id" => 3
        ]);

        Task::create([
            "description"=> "dome's task3",
            "user_id" => 3
        ]);
    }
}
