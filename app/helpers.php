<?php 
use App\Post;

if(!function_exists('createMySlug')){
    function createMySlug($slug) {
        $slug_iniziale = $slug;
        $founded_post = Post::where('slug',$slug)->first();
        $counter = 0;
        while ($founded_post) {
            $counter++;
            $slug = $slug_iniziale . '-' . $counter;
            $founded_post = Post::where('slug',$slug)->first();
        }
    }
}