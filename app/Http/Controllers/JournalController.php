<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;

class JournalController extends Controller {
    public function index() {
        
        $results = Post::orderBy('created_at')->get();
        
        return view('save')->with([
            'data' => $results
        ]);
    }
    
    public function processForm(Request $request){
        if (isset($_POST['save_button'])) {
            $this->validate($request, [
                'date' => 'required|date',
                'title' => 'required'
            ]);
         
            $journalEntry= new Post();
            $journalEntry->title = $request->input('title');
            $journalEntry->post = $request->input('journal-entry');
            $journalEntry->save();
           return redirect('/');  
        } else if (isset($_POST['update_button'])) {
             $this->validate($request, [
                'title' => 'required'
            ]);
            
            $result = Post::orderBy('created_at')->get();
            $result->title = $request->input('title');
            $result->post = $request->input('journal-entry');
            #dump($result);
            #return;
            $result->save();
            return redirect('/');  
        }
        else if (isset($_POST['delete_button'])) {
            $result = Post::where('created_at', '=', $_POST['date'])->delete();
            return redirect('/'); 
        }
    }
    
    public function editForm($id){
        $results = Post::orderBy('created_at')->get();
        $edit = Post::where('created_at', '=', $id)->get()->toArray();
        return view('edit')->with([
            'data' => $results,
            'edit' => $edit
        ]);
    }
}
