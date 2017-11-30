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
            'heart break', 
            'eating out',  
            'bf troubles',
            'Atlanta'
          ];
        
        
        foreach ($tags as $tag) {
            Tag::insert([
                'tag' =>$tag
            ]);
        }
    }
}
