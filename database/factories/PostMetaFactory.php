<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostMeta>
 */
class PostMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meta_robots' => $this->faker->word(),
            'meta_keywords' => $this->faker->words($maxNbChars = 50),
            'meta_description' => $this->faker->text(),
            'post_id' => random_int(1, 100),
        ];
    }
}
