<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);
        \App\Models\Task::factory(10)->create([
            'title' => fake()->text(10),
            'description' => fake()->text(20),
            'user_id' => 1,
            'is_completed' => fake()->boolean(30)
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
