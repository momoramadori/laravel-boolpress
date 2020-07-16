<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','tags')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();
        $categories = Category::all();
        $data =[
            'tags' => $tags,
            'categories'=> $categories
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image' => 'image|max:1024'
        ]);
        $slug = Str::of($data['title'])->slug('-');
        createMySlug($slug);
        $data['slug']= $slug;
        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads',$data['image']);
            $data['cover_image']= $img_path;
        }
        
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();
        if (!empty($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
         };
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('admin.posts.show', ['post' => $post]);
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $post= Post::find($id);
        $categories = Category::all();
        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];
        if ($post) {
            return view('admin.posts.edit', $data);
        } else {
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'content' => 'required',
            'image' => 'image|max:1024'
        ]);

        $data = $request->all();
        $newPost = Post::find($id);

        $slug = Str::of($data['title'])->slug('-');
        createMySlug($slug);
        $data['slug']= $slug;

        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads',$data['image']);
            $data['cover_image']= $img_path;
        }
        
        $newPost->update($data);

        if (!empty($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
        } else {
            $newPost->tags()->sync([]);
        };
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->tags()->detach();
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            return abort('404');
        }
    }
}
