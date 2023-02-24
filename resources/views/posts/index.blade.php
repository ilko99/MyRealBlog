@extends('layouts.app')

@section('title', 'All posts')
    
@section('content')
<div class="row">
    <div class="col-8">
    @foreach($posts as $key => $post)
    <h3 class="pt-2"><a class="text-dark" href="{{route('posts.show', ['post'=>$post->id])}}">{{$post['title']}}</a></h3>
    <p class="text-muted">Created by {{$post->user->name}}, {{$post->created_at->diffForHumans()}}</p>
        @if ($post->comments_count)
            <p>{{$post->comments_count}} comments</p>
            @else
            <p>No comments</p>
        @endif
        <div>
            @can('update', $post)
            <a class="btn btn-primary" href="{{route('posts.edit', ['post'=>$post->id])}}" >Update post</a>
            @endcan
           
            @can('delete', $post)
            <form class="d-inline" action="{{route('posts.destroy', ['post'=>$post->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-primary" type="submit" value="Delete">
        </form>
            @endcan
        </div>
       
    
    @endforeach


</div>
<div class="col-4">
  <div class="container">
    <div class="row">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Most commented</h5>
          <h6 class="card-subtitle mb-2 text-muted">What people are talking about right now</h6>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($mostCommented as $post)
          <li class="list-group-item">
            <a class="text-dark" href="{{route('posts.show',['post'=>$post->id])}}">{{$post->title}}</a>
          </li>
            @endforeach
        </ul>
      </div>
    </div>
</div>


    <div class="container">
      <div class="row">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Most commented</h5>
            <h6 class="card-subtitle mb-2 text-muted">What people are talking about right now</h6>
          </div>
          <ul class="list-group list-group-flush">
              @foreach($mostActive as $user)
            <li class="list-group-item">
              {{$user->name}}
            </li>
              @endforeach
          </ul>
        </div>
      </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Most commented</h5>
          <h6 class="card-subtitle mb-2 text-muted">What people are talking about right now</h6>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($mostActiveLastMonth as $user)
          <li class="list-group-item">
            {{$user->name}}
          </li>
            @endforeach
        </ul>
      </div>
    </div>
</div>
@endsection