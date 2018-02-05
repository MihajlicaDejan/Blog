@extends('layouts.main')
@section('title', '| Contact')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact me</h1>
                <hr>
                <form method="post" action="{{url('contact')}}">
                    @include('partials.error')
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Email:</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Subject:</label>
                        <input name="subject" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Message:</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send Message</button>
                </form>
            </div>
        </div>
@endsection