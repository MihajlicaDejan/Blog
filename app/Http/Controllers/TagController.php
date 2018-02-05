<?php

namespace App\Http\Controllers;
use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'tag' => 'required'
        ]);

        $tag = Tag::create([
           'tag' => $request->tag
        ]);

        $tag->save();

        Session::flash('success', 'Tag is created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'tag' => 'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->tag = $request->tag;

        $tag->save();

        Session::flash('success', 'Tag is UPDATED');
        return redirect()->route('tags');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        foreach($tag->posts as $post)
        {
            $post->forceDelete();
        }
        $tag->delete();

        Session::flash('info', 'Tag is DELETED');
        return redirect()->back();
    }
}
