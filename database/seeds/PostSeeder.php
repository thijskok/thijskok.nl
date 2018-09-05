<?php

use App\Post;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class PostSeeder extends Seeder
{
    /**
     * Seed posts.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();

        factory(Post::class, 100)
            ->create()
            ->each(function (Post $post) use ($tags) {
                return $post->attachTags($tags->random(rand(1, 4)));
            });
    }
}
