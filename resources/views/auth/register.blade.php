@extends('layouts.app')

@section('content')
<form action="{{route('register')}}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input class="form-control {{$errors->has('name') ? 'is-invalid': ''}}" required name="name" value="{{old('name')}}" id="name" type="text">
        @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif
    </div>
    <div>
        <label for="email">Email</label>
        <input class="form-control {{$errors->has('email') ? 'is-invalid': ''}}" required name="email" value="{{old('email')}}" id="email" type="email">
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('email')}}</strong>
            </span>
        @endif
    </div>
    <div>
        <label for="password">Password</label>
        <input class="form-control {{$errors->has('password') ? 'is-invalid': ''}}" required name="password" id="password" type="password">
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password')}}</strong>
            </span>
        @endif
    </div>
    <div>
        <label for="">Confirm Password</label>
        <input class="form-control" required name="password_confirmation" type="password">
    </div>
    <div class="p-2">
        <button class="btn btn-primary btn-block" type="submit">Register</button>
    </div>
</form>
@endsection
