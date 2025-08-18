<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Project::truncate();
        Task::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@tasksys.com',
            'password' => Hash::make('123456'),
        ]);

        $this->call([
            ProjectTableSeeder::class,
            TaskTableSeeder::class,
        ]);
    }
}
