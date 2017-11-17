<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Post;

class JournalController extends Controller {
    public function index() {
        
        $results = Post::orderBy('created_at')->get()   ;
        
        return view('master')->with([
            'posts' => $results
        ]);
    }
}
