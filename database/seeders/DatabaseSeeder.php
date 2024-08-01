<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use Illuminate\Database\Seeder;

use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Create 50 posts
        Post::factory()->count(50)->create();

        // Number of posts
        $numberOfPosts = Post::count();

        // For each post generate 2 comments
        // Only run this at
        for($postId=1 ; $postId <= $numberOfPosts; $postId++)
        {
            // For each post create 1 comments
            Comment::factory(2)->create(['post_id' => $postId ] );
        }

    //
    //         $post->comments()->
    //         create([    'user_id'   => User::factory() ,
    //                     'post_id'   => $post->id,
    //                     'body'      => ]);

    // };
    }
}
