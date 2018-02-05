@extends('layouts.main')
@section('title', '| Delete Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h1>DELETE THE COMMENT</h1>
            <p>
                <strong>Name: </strong>{{$comment->name}}<br>
                <strong>Email: </strong>{{$comment->email}}<br>
                <strong>Comment: </strong>{{$comment->comment}}
            </p>
            <form method="get" action="{{route('comment.destroy', $comment->id)}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-danger">DESTROY</button>
            </form>
        </div>
    </div>
@endsection