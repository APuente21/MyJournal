<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $tags = [
            'love',
            'LGBTQ', 
            'dinning',  
            'travel',
            'Atlanta'
          ];
        
        
        foreach ($tags as $tag) {
            Tag::insert([
                'tag' =>$tag,
                'updated_at' => '2017-11-10 15:45:57',
                'created_at' => '2017-11-10 15:45:57'
            ]);
        }
    }
}
