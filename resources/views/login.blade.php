@extends('navbar-guest-template')

@section('title', 'login')

@section('content')
    
<div class="mt-5" style="justify-content:center; align-items:center; display:flex;">
    <div class="card w-50" style="background-color:#f0ad4e">
        <div class="card-body">
            <h1 class="text-center">{{ trans('dicts.Login')}}</h1>

            <form method="POST" action="{{ url('/login')}}">
                @csrf

                <div class="form-group">
                    <label>{{ trans('dicts.Email address')}}</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ Cookie::get('email_cookie') != null ? Cookie::get('email_cookie') : '' }} " required>
                </div>

                <div class="form-group">
                    <label>{{ trans('dicts.Password')}}</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember" value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
                    <label class="form-check-label" for="exampleCheck1">{{ trans('dicts.Remember Me')}}</label>
                </div>

                <div class="text-center">

                    <button type="submit" class="btn btn-success">{{ trans('dicts.Sign In')}}</button>
                    <p>{{ trans('dicts.Not Registered yet?')}}
                        <a href="/register">{{ trans('dicts.Sign Up Here')}}</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection