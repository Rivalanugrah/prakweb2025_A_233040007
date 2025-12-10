<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User dulu
                User::create([
            'name' => 'User One',
            'username' => 'userone',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'User Two',
            'username' => 'usertwo',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'User Three',
            'username' => 'userthree',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'User Four',
            'username' => 'userfour',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'User Five',
            'username' => 'userfive',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('password')
        ]);


        // 2. Buat Category
        Category::factory()->create([
            'name' => 'Programing',
            'slug' => 'programing' 
        ]);

         // 2. Buat Category
        Category::factory()->create([
            'name' => 'Design',
            'slug' => 'design' 
        ]);

        // 10 Posts
        Post::factory(10)->create();
    }
}
