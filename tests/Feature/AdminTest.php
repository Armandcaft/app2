<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_blog_page_contains_data()
    {
        $user = User::create([
            'name' => 'Christian Armand',
            'email' => 'fohomtchuente@gmail.com',
            'password' => \bcrypt('password'),
            'nickname' => 'Stormeur',
            'is_admin' => 1
        ]);
        $post = Post::factory(11)->create();

        $response = $this->actingAs($user)->get('/blog');

        $response->assertStatus(200);
        // $response->assertViewHas('posts', function  ($collection) use ($post) {
        //     return !$collection->contains($post);
        // });
    }
}
