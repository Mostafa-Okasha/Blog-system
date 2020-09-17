<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @yield('style')
</head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @if(!Auth::check())
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/posts') }}">All Posts <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/comments') }}">All Comment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admins/login') }}">Login form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/messages/message') }}">Contact Us</a>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/posts') }}">All Posts <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/posts/create') }}">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admins') }}">All Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admins/create') }}">Add Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admins/logout') }}">Logout</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

    @yield('content')
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
    </body>
</html>
