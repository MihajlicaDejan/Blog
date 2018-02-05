@extends('layouts.main')
@section('title', '| Edit Comment')

@section('content')
    <h1>Edit Comment</h1>
    <form method="post" action="{{route('comment.update', $comment->id)}}">
    <input  type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" disabled="disabled" value="{{$comment->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" disabled="disabled" value="{{$comment->email}}">
        </div>
        <div class="form-group">
            <label>Comment</label>
            <textarea name="comment" class="form-control">{{$comment->comment}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection