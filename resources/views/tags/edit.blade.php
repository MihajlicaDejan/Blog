@extends('layouts.main')
@section('title', '| Update Tag')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{route('tag.update', $tag->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>New Name</label>
                    <input type="text" name="tag" class="form-control" value="{{$tag->name}}">
                </div>
                <button type="submit" class="form-control btn btn-success btn-block">Update tag</button>
            </form>
        </div>
    </div>
@endsection