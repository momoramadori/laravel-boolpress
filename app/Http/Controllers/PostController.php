<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('guest.index', compact('posts'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return view('guest.show', compact('post'));
        } else {
            return abort('404');
        }
        
    }
}
