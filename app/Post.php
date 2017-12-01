<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    public static function getAllTags(){
        $tags = Tag::orderBy('id')->get();
        $tagsArrayByID = [];
        
        foreach ($tags as $tag) {
            $tagsArrayByID[$tag['id']] = $tag->tag;
        }
        return $tagsForCheckboxes;
    }
}
