@extends('layouts.main')
@section('title', '| Create')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create post</h1>
            <hr>
            @include('partials.error')
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea id="body" name="body" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success form-control">Create post</button>
            </form>
        </div>
    </div>
@endsection
