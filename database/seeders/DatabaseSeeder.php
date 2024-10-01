<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Quiz::create([
            'title' => 'tes',
            'topic' => 'math',
            'time' => 20,
            'number_of_questions' => 5,
            'level' => 'Easy'
        ]);
    }
}
