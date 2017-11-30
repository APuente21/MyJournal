<?php

use Illuminate\Database\Seeder;
use App/Tag;
use App/Post;


class PostTagTableSeeder extends Seeder {
    public function run() {
        $posts = [
            'Title 1' => ['eating out', 'bf troubles'],
            'Title 2' => ['heart break', 'Atlanta'],
            'Title 3' => ['love out']
        ]
        
        foreach ($posts as $title => $tags) {
            $post = Post::where('title', 'like', $title)->first();

            foreach ($tags as $name) {
                $tag = Tag::where('tag', 'LIKE', $name)->first();
                $post->tags()->save($tag);
            }
        }
    }
}
