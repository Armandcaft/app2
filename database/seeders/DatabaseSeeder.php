<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\PostMeta;
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

        // \App\Models\U:ser::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,  //Upon executing 'php artisan db:seed, calls AdminSeeder.
            PostsTableSeeder::class,
            PostMetaSeeder::class,
        ]);

        Post::factory(100)->create();
        PostMeta::factory(100)->create();
    }
}
