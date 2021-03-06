<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        @include('partials._nav')
        @if(Auth::check())
            <div class="container">
                @yield('content')
                @include('partials._footer')
            </div>
        @endif
        @include('partials._javascript')
    </body>
</html>