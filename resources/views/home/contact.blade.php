@extends('layouts.app')



@section('content')
<h2>Contact page</h2>

@can('home.secret')
<div>
    <p>Secret contact link: <a href="{{route('home.secret')}}">Click here</a></p>
</div>
@endcan
@endsection