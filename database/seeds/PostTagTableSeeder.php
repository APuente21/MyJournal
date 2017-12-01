<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;


class PostTagTableSeeder extends Seeder {
    public function run() {
        $posts = [
            'The Struggle Begins' => ['LGBTQ', 'dinning'],
            'I\'m stuck with this project' => ['travel', 'Atlanta'],
            'Bugs, a day in the life of a developer' => ['love', 'LGBTQ'],
            'Return of the last developer' => ['Atlanta', 'LGBTQ', 'travel']
        ];
        
        foreach ($posts as $title => $tags) {
            $post = Post::where('title', 'LIKE', $title)->first();

            foreach ($tags as $name) {
                $tag = Tag::where('tag', 'LIKE', $name)->first();
                $post->tags()->save($tag);
            }
        }
    }
}
