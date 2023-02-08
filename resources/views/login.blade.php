@extends('navbar-guest-template')

@section('title', 'login')

@section('content')
    
<div class="mt-5" style="justify-content:center; align-items:center; display:flex;">
    <div class="card w-50" style="background-color:#f0ad4e">
        <div class="card-body">
            <h1 class="text-center">Login</h1>

            <form method="POST" action="{{ url('/login')}}">
                @csrf

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ Cookie::get('email_cookie') != null ? Cookie::get('email_cookie') : '' }} " required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember" value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>

                <div class="text-center">

                    <button type="submit" class="btn btn-success">Sign In</button>
                    <p>Not Registered yet?
                        <a href="/register">Sign Up Here</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection