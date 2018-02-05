@extends('layouts.main')
@section('title', '| Index')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Hello Dejan</h1>
                    <p class="lead">Welcome to your ovn blog!</p>
                    <p><a href="" class="btn btn-primary">Popular Post</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post">
                        <h3>{{$post->title}}</h3>
                        <p>{{ substr($post->body, 0, 300)}} {{strlen($post->body) > 300 ? '...' : ''}}</p>
                        <a href="{{route('post.show', $post->id)}}" class="btn btn-success">Read More</a>
                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
        </div>
@endsection
