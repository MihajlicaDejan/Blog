@extends('layouts.main')
@section('title', '| Edit')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Edit post</h1>
            <hr>
            @include('partials.error')
            <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($post->category->id == $category->id)
                                    selected
                                    @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                          @foreach($post->tags as $t)
                                          @if($tag->id == $t->id)
                                          checked
                                        @endif
                                        @endforeach
                                >{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea id="body" name="body" class="form-control">{{$post->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-success form-control">Update post</button>
            </form>
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
                        <a href="{{route('posts')}}" class="btn btn-success btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('post.delete', $post->id)}}" class="btn btn-danger btn-block">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection