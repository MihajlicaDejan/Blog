<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{route('index')}}">Home <span class="sr-only">(current)</span></a></li>
                <li class="{{Request::is('posts') ? 'active' : ''}}"><a href="{{route('posts')}}">All Post</a></li>
                <li class="{{Request::is('categories') ? 'active' : ''}}"><a href="{{route('categories')}}">Category</a></li>
                <li class="{{Request::is('tags') ? 'active' : ''}}"><a href="{{route('tags')}}">Tag</a></li>
                <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="{{route('contact')}}">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dejan Mihajlica<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('login')}}">Login</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>