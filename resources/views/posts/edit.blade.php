@extends('layouts.app')

@section('title', 'Update posts')

@section('content')
    <form action="{{route('posts.update', ['post'=>$post->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-gropu">
        <label for="title">Title</label>
        <input class="form-control" id="title" type="text" name="title" value="{{old('title', optional($post ?? null)->title)}}">
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content">{{old('content', optional($post ?? null)->content)}}</textarea>
        @error('content')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <input class="btn btn-primary btn-block" type="submit" value="Create post">
    </div>
    </form>
@endsection