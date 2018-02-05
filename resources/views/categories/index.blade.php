@extends('layouts.main')
@section('title', '| Category')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Category</h1>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-success">Edit</a></td>
                            <td><a href="{{route('category.delete', $category->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <h2>Create Category</h2>
                @include('partials.error')
                <form method="post" action="{{route('category.store')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button type="submit" class="form-control btn btn-success btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection