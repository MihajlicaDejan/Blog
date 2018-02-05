<?php

namespace App\Http\Controllers;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
           'body'  => 'required',
           'category_id' => 'required',

        ]);


        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('images', $image_new_name);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->image = 'images/'. $image_new_name;

        $post->save();

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post is created');
        return redirect()->route('index');
    }


    public function show($id)
    {
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post', 'tags'));
    }


    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'category_id' => 'required',

        ]);

        $post = Post::findOrFail($id);
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('images', $image_new_name);
            $post->image = 'images/' .$image_new_name;
            Storage::delete($post->image);
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Blog is updated');
        return redirect()->route('posts');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();

        Session::flash('info', 'Blog is deleted');
        return redirect()->route('posts');
    }
}
