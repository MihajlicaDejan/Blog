<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;

        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success', 'Comment was added');
        return redirect()->route('post.show', [$post->id]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'comment'   =>  'required|min:5|max:2000'
        ));

        $comment = Comment::findOrfail($id);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment has changed');
        return redirect()->route('post.show', $comment->post->id);
    }


    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.delete', compact('comment'));
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Comment is deleted');
        return redirect()->route('post.show', $post_id);
    }
}
