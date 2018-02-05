@extends('layouts.main')
@section('title', '| All Post')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('post.create')}}" class="btn btn-warning posts-margin-btn">Create new post</a>
        </div>
    </div><!-- end of row-->
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category ? $post->category->name : 'no category'}}</td>
                        <td>{{ substr($post->body, 0, 20)}}{{strlen($post->body) > 20 ? '...' : ''}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('post.show', $post->id)}}" class="btn btn-info">View</a> <a href="{{route('post.edit', $post->id)}}" class="btn btn-success">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection