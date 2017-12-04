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
        $results = Post::orderBy('created_at')->get();
        $tagsToRemove = Tag::doesntHave('posts')->get();
        
       //Query all tags that are not mapped to a post and delete them from the database
        if (!$tagsToRemove->isEmpty()){
            foreach ($tagsToRemove as $tag){
               $tag->delete();
            }
        }
        
        $tags = Tag::all();
        
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
            
            //save tags to DB
            Tag::saveTags($tagsInForm, $journalEntry);

           return redirect('/');  
            
        } 
        
        //if Updated button was run then follow these steps
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
            
            
            Tag::updateTags($tagsInForm, $result);

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
    
    //This method is called when you select a post in the website. It querries the DB for the items 
    //pertaining to that post and sends it to the edit.blade.php view
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
    
    //This method is called when you click on a specific tag. It queries the DB for all the post
    //linked to the specified tag and passes the information to the search.blade.php view
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
