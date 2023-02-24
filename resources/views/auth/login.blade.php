@extends('layouts.app')

@section('content')
<form action="{{route('login')}}" method="POST">
    @csrf
    
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
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" name="remember" type="checkbox" value="{{old('remember') ? 'checked': ''}}">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
    </div>
    
    
    <div class="p-2">
        <button class="btn btn-primary btn-block" type="submit">Login</button>
    </div>
</form>
@endsection
