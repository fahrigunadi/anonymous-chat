<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GroupChat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        GroupChat::insert([
            [
                'browser_id' => 'fdaffdadsa32',
                'message' => 'Hai Welcome'
            ],
            [
                'browser_id' => 'fdaffdadsa32',
                'message' => 'Welcome oge mang'
            ],
            [
                'browser_id' => 'fdaffdadsa32',
                'message' => 'Enya Welcome'
            ],
        ]);
    }
}
