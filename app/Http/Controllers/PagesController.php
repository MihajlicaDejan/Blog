<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Session;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.index', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'message' => 'required',
            'subject' => 'required|min:3'
        ]);
        $data =
            array(
            'email'         => $request->email,
            'bodymessage'   => $request->message,
            'subject'       => $request->subject
            );

        Mail::send('email.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('mihajlicad@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Yur message is SENT');
        return redirect()->back();
    }

}
