@extends('layouts.main')
@section('title', '| Update')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{route('category.update', $category->id)}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>New Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <button type="submit" class="form-control btn btn-success btn-block">Update category</button>
            </form>
        </div>
    </div>
@endsection