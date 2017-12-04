<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    public function posts() {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
    //This method is called when a post is being created for the first time
    public static function saveTags($tagsInForm, $journalEntry){
        for ($x = 0; $x<count($tagsInForm); $x++){
                //queery tag in the databse
                $tagInDB = Tag::where('tag', '=', $tagsInForm[$x])->get();
                //if the tag does not exist then add to tag db and join table
                if($tagInDB->isEmpty()){
                    $tag= new Tag();
                    $tag->tag = $tagsInForm[$x];  
                    $tag->save();
                    $tag->posts()->save($journalEntry);
                }   
                //the tag is already in the tag table so just add it to the join table
                else {          
                    $journalEntry->tags()->attach($tagInDB);
                }        
        }  
    }
    
    
    //this method is called when a post is being updated
    public static function updateTags($tagsInForm, $result){
        $tagsInPost = $result->tags;//get tags that are in the post
        for ($x = 0; $x<count($tagsInForm); $x++){
                $tagInDB = Tag::where('tag', '=', $tagsInForm[$x])->get();//queery tag from DB

                //if it's a new tag, create it, save it, then link it to post
                if($tagInDB->isEmpty()){
                    $tag= new Tag();
                    $tag->tag = $tagsInForm[$x];  
                    $tag->save();
                    $tag->posts()->save($result);
                } else {
                    //check if the tag is alrady in the dabatase, but has not been mapped to this post
                    $test = false;
                    foreach ($tagsInPost as $myTag){
                        if (strcmp($myTag->tag,$tagInDB[0]->tag) == 0){
                            $test = true;
                            break;
                        }
                    }
                    //if it hasn't been mapped, then map the tag to the post
                    if(!$test) {
                        $result->tags()->save($tagInDB[0]);
                    }
                }        
            }
            
            //loop through all the tags in the post, if any of the tags have been removed, then detach them in the db
            for ($y = 0; $y < count($tagsInPost); $y++){
                if(!(in_array($tagsInPost[$y]->tag,$tagsInForm))){
                    $tagsInPost[$y]->posts()->detach($result->id);
                }
            }
    }
}
