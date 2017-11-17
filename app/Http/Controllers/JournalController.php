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
    
        return view('master')->with([
            'data' => $results,
            'dates' => $myDates,
            'titles' => $titles
        ]);
    }
}
