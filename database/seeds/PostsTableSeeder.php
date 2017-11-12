<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $posts = [
            ['2017-11-10 15:45:57', 'Post 1'],
            ['2017-11-10 17:45:57', 'Post 2'], 
            ['2017-11-11 15:45:57', 'Post 3'],  
            ['2017-11-12 15:45:57', 'Post 4']  
          ];
        
        
        foreach ($posts as $key => $post) {
            Post::insert([
                'created_at' => $post[0],
                'updated_at' => $post[0],
                'post' => $post[1]
            ]);
        }
    }
}
