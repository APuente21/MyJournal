<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;
use App\Tag;

class JournalController extends Controller {
    
    //Function that executes whenever you access main page. It queries database to get list of post in database
    //and passess results to view
    public function index() {
        
        $tags = Tag::all();
        $results = Post::orderBy('created_at')->get();
        
        return view('save')->with([
            'data' => $results,
            'tags' => $tags
        ]);
    }
    

    /*THis is the main method in the controller that handles deleting post,
    * updating a post, saving tags, updating tages, removing tags. The method 
    * decides which operation to perform based on the name of the button that 
    * was pressed 
    */
    public function processForm(Request $request){

        //if "save" button was selected
        if (isset($_POST['save_button'])) {
            $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required',
                'tags' => 'required'
            ]);
            
            //get current hour, min, sec
            $hour = date("h");
            $min = date("m");
            $sec = date("s");

            //modify inported date with
            $date = new \DateTime($_POST['date']);
            $date->format('Y-m-d H:i:s');
            $date->modify("+{$hour} hours");
            $date->modify("+{$min} minutes");
            $date->modify("+{$sec} seconds");
                    
            //creates an array of tags entered in the form
            $tagsInForm = explode(" ", $request->input('tags'));
            
            //Create a post model and save corresponding 
            $journalEntry= new Post();
            $journalEntry->created_at = $date;
            $journalEntry->updated_at = $date;
            $journalEntry->title = $request->input('title');
            $journalEntry->post = $request->input('journal-entry');
            $journalEntry->save();
            
            for ($x = 0; $x<count($tagsInForm); $x++){
                $result = Tag::where('tag', '=', $tagsInForm[$x])->get();
                if(count($result->toArray()) == 0){
                    $tag= new Tag();
                    $tag->tag = $tagsInForm[$x];  
                    $tag->save();
                    $tag->posts()->save($journalEntry);
                }           
            }

           return redirect('/');  
            
        } //if Updated button was run then follow these steps
        else if (isset($_POST['update_button'])) {
             $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required',
                'tags' => 'required'
            ]);
            $tagsInForm = explode(" ", $request->input('tags'));
            
            $result = Post::with('tags')->where('created_at', '=', $_POST['date'])->first();
            $result->title = $request->input('title');
            $result->post = $request->input('journal-entry');
            $result->save(); 
            
            $tagsInPost = $result->tags;
            
            //query tag, if not in database then add to tag and relation table in db
            for ($x = 0; $x<count($tagsInForm); $x++){
                $tagInDB = Tag::where('tag', '=', $tagsInForm[$x])->get();

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
            
            //loop through all the tags in the post, if any of the posts have been removed, then detach them in the db
            for ($y = 0; $y < count($tagsInPost); $y++){
                if(!(in_array($tagsInPost[$y]->tag,$tagsInForm))){
                    $tagsInPost[$y]->posts()->detach($result->id);
                }
            }
            return redirect('/');  
        }
        //if delete button was selected
        else if (isset($_POST['delete_button'])) {
            $result = Post::with('tags')->where('created_at', '=', $_POST['date'])->delete();
            
            return redirect('/'); 
        }
        //if cancel button was selected
        else{
            return redirect('/'); 
        }
    }
    
    public function editForm($id){
        $results = Post::orderBy('created_at')->get();
        $tags = Tag::all();
        $edit = Post::where('created_at', '=', $id)->get()->toArray();
        $book = Post::with('tags')->where('created_at', '=', $id)->get()->toArray();
        $tagsForForm = '';
        for ($x = 0; $x < count($book[0]['tags']); $x++){
            if ($x == count($book[0]['tags']) - 1)
                $tagsForForm .= $book[0]['tags'][$x]['tag'];
            else
                $tagsForForm .= $book[0]['tags'][$x]['tag']. ' ';
        }
        return view('edit')->with([
            'data' => $results,
            'tags' => $tags,
            'edit' => $edit,
            'tagsForForm' => $tagsForForm 
        ]);
    }
    
    public function search($id){
        $results = Post::orderBy('created_at')->get();
        $tags = Tag::all();
        $posts = (Tag::with('posts')->where('tag','=',$id)->get()->toArray())[0]['posts'];
        return view('search')->with([
            'search' =>  $id,
            'data' => $results,
            'tags' => $tags,
            'posts' => $posts
        ]);
    }
    
}
