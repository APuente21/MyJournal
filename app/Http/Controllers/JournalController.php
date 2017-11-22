<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;

class JournalController extends Controller {
    public function index() {
        
        $results = Post::orderBy('created_at')->get();
        
        $myDates = array();
        $titles = array();
        
        foreach ($results as $result){
            $myDates[] = date_parse($result->created_at);
            $titles[] = $result->title;
        }
       # dump($myDates);
        
        return view('master')->with([
            'data' => $results,
            'test' => false,
            'dates' => $myDates,
            'titles' => $titles
        ]);
    }
    
    public function processForm(Request $request){  
        $this->validate($request, [
            'date' => 'required|date',
            'title' => 'required'
        ]);
         
        $journalEntry= new Post();
        $journalEntry->title = $request->input('title');
        $journalEntry->post = $request->input('journal-entry');
        $journalEntry->save();
       return redirect('/');
    }
    
    public function editForm($id){
            dump($id);
            $result = Post::where('created_at', '=', $id)->get();
            #$myDates = $result->created_at;
            #$titles = $result->title;
            #$post = $result->post;
            dump($result);
                
        return view('master')->with([
            'data' => $result,
            'test' => true,
        ]);
    }
}
