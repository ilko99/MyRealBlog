<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Laravel app - @yield('title')</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">  
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{route('home.index')}}">Home</a>
            <a class="p-2 text-dark" href="{{route('home.contact')}}">Contact</a>
            <a class="p-2 text-dark" href="{{route('posts.index')}}">Posts</a>
            <a class="p-2 text-dark" href="{{route('posts.create')}}">Create a post</a>

            @guest
            @if (Route::has('register'))
            <a class="p-2 text-dark" href="{{route('register')}}">Register</a>
            @endif
            <a class="p-2 text-dark" href="{{route('login')}}">Login</a>
            @else
            <a class="p-2 text-dark" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout ({{Auth::user()->name}})</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </nav>
    </div>
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success">
            <p>{{session('status')}}</p>
        </div>
            
        @endif
        @yield('content')
    </div>
    
</body>
</html>
