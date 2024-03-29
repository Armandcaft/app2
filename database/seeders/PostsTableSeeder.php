<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of Post One',
                'body' => 'Body of Post One',
                'image_path' => 'Empty',
                'is_published' => 0,
                'min_to_read' => 2,
                'user_id' => 2,
            ],
            [
                'title' => 'Post Two',
                'excerpt' => 'Summary of Post Two',
                'body' => 'Body of Post Two',
                'image_path' => 'Empty',
                'is_published' => 1,
                'min_to_read' => 2,
                'user_id' => 2,
            ],
            ['
                title' => 'Model Factories',
                'excerpt' => 'Excerpt of our first model factory',
                'body' => 'Content of body',
                'image_path' => 'Image Path',
                'is_published' => 1,
                'min_to_read' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Post Four',
                'excerpt' => 'Summary of Post Four',
                'body' => 'Body of Post Four',
                'image_path' => 'Empty',
                'is_published' => 0,
                'min_to_read' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Post Five',
                'excerpt' => 'Summary of Post Five',
                'body' => 'Body of Post Five',
                'image_path' => 'Empty',
                'is_published' => 1,
                'min_to_read' => 2,
                'user_id' => 3,
            ],
            [
                'title' => 'Model Factories 2',
                'excerpt' => 'Excerpt of our sixth model factory',
                'body' => 'Content of body',
                'image_path' => 'Image Path',
                'is_published' => 1,
                'min_to_read' => 2,
                'user_id' => 3,
            ],
            [
                //
            ],
        ];

        /**
         * Looping over the array $post
         * using the QueryBuilder by a foreach.
         *
         * We use a $value since we only need that
         * from that array to seed into the database.
         */
        foreach ($post as $key => $value) {
            Post::create($value);
        }

        Post::factory(100)->create();
    }
}
