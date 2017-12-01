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
                'title' => 'required',
                'tags' => 'required'
            ]);
            $tags = explode(" ", $request->input('tags'));
            
            $journalEntry= new Post();
            $journalEntry->title = $request->input('title');
            $journalEntry->post = $request->input('journal-entry');
            $journalEntry->save();
            
            for ($x = 0; $x<count($tags); $x++){
                $result = (Tag::where('tag', '=', $tags[$x])->get())->toArray();
                if(count($result) == 0){
                    $tag= new Tag();
                    $tag->tag = $tags[$x];  
                    $tag->save();
                    $tag->posts()->save($journalEntry);
                }               
            }

           return redirect('/');  
            
        } else if (isset($_POST['update_button'])) {
             $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required',
                'tags' => 'required'
            ]);
            $result = App\Post::where('created_at', '=', $_POST['date'])->first();
            $result->title = $request->input('title');
            $result->post = $request->input('journal-entry');
            
            
            
            #implement tag update
           ## $result->tags()->sync($request->input('tags'));
        
            
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
        $book = Post::with('tags')->where('created_at', '=', $id)->get()->toArray();
        $tagsForForm = '';
        for ($x = 0; $x < count($book[0]['tags']); $x++){
            if ($x == count($book[0]['tags']) - 1)
                $tagsForForm .= ' '. $book[0]['tags'][$x]['tag'];
            else
                $tagsForForm .= $book[0]['tags'][$x]['tag'];
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
