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
    
    public function processForm(Request $request){
        if (isset($_POST['save_button'])) {
            $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required'
            ]);
            $tags = explode(" ", $request->input('tags'));
            
            $journalEntry= new Post();
            $journalEntry->title = $request->input('title');
            $journalEntry->post = $request->input('journal-entry');
            $journalEntry->save();
            
            for ($x = 0; $x<count($tags); $x++){
                $result = Tag::where('tag', '=', $tags[$x])->get();
                if($result == null){
                    $tag= new Tag();
                    $tag->tag = $tags[$x];
                    $tag->save();
                }
                            
            }

           return redirect('/');  
            
        } else if (isset($_POST['update_button'])) {
             $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required'
            ]);
            $result = App\Post::where('created_at', '=', $_POST['date'])->first();
            $result->title = $request->input('title');
            $result->post = $request->input('journal-entry');

           # return ;
            $result->save();
            return redirect('/');  
        }
        
        else if (isset($_POST['delete_button'])) {
            $result = Post::where('created_at', '=', $_POST['date'])->delete();
            return redirect('/'); 
        }
        
        else{
            return redirect('/'); 
        }
    }
    
    public function editForm($id){
        $results = Post::orderBy('created_at')->get();
        $tags = Tag::all();
        $edit = Post::where('created_at', '=', $id)->get()->toArray();
        return view('edit')->with([
            'data' => $results,
            'tags' => $tags,
            'edit' => $edit
        ]);
    }
    
    public function search($id){
        $results = Post::orderBy('created_at')->get();
        $tags = Tag::all();
        
        
        //add code to search posts that have selected tag    
        
        return view('search')->with([
            'search' =>  $id,
            'data' => $results,
            'tags' => $tags
        ]);
    }
    
}
