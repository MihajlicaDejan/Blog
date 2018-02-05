@extends('layouts.main')
@section('title', '| View Post')
@section('content')
    <div class="col-md-8">
        <h1>{{$post->title}}</h1>Category: <b>{{$post->category->name}}</b>
        <hr>
        <img src="{{asset('images', $post->image)}}">
        <p>{!! $post->body !!}</p>
        <hr>
        <div>Tehnologije:
        @foreach($post->tags as $tag)
            <span class="label label-default">{{$tag->tag}}</span>
        @endforeach
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{$post->created_at->diffForHumans()}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Last Update:</dt>
                <dd>{{$post->updated_at->diffForHumans()}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-success btn-block">Edit</a>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('post.delete', $post->id)}}" class="btn btn-danger btn-block">Delete</a>
                </div>

                <div class="col-sm-12">
                    <a href="{{route('posts')}}" class="btn btn-warning btn-block">Back to All Posts</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>Komentari</h2>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="col-md-4 well">
            <div id="comment-form">
                <h1>Comment form</h1>
                @include('partials.error')
                <form method="post" action="{{route('comments.store', $post->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Comment:</label>
                            <textarea name="comment" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block form-control">Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 well">
            <div class="all-comment">
                <h2>Comments <small>{{$post->comments()->count()}} on this blog</small></h2>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->comment}}</td>
                                <td><a href="{{route('comment.edit', $comment->id)}}" class="btn btn-success">Edit</a></td>
                                <td><a href="{{route('comment.delete', $comment->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection