@extends('layouts.main')
@section('title', '| Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tag</h1>
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td><a href="{{route('tag.edit', $tag->id)}}" class="btn btn-success">Edit</a></td>
                        <td><a href="{{route('tag.delete', $tag->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <h2>Create Tag</h2>
                @include('partials.error')
                <form method="post" action="{{route('tag.store')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="tag" class="form-control">
                    </div>
                    <button type="submit" class="form-control btn btn-success btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection