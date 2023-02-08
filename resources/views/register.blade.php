@extends('navbar-guest-template')

@section('title', 'register')

@section('content')

<div class="mt-5 me-2" style="justify-content:center; align-items:center; display:flex;">
    <div class="card w-50" style="background-color:#f0ad4e">
        <div class="card-body">
            <h1 class="text-center">{{ trans('dicts.Register') }}</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{$message}}</strong>
                </div>

                <img src="{{ asset('images/'.Session::get('display_picture')) }}" />
            @endif

            <form action={{url('/register')}} method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="">{{ trans('dicts.First Name')}}</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="(5-20 letters)" required autofocus>

                    @error('first_name')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="">{{ trans('dicts.Last Name')}}</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="(5-20 letters)" required autofocus>

                    @error('last_name')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">{{ trans('dicts.Email')}}</label>
                    <input type="email" name="email" id="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>

                    @error('email')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="disabledSelect" class="form-label">{{ trans('dicts.Role')}}</label>
                    <select id="disabledSelect" class="form-select" name="role" id="role">
                        @foreach ($role_data as $data)

                            <option value="{{$data->role_name}}">{{$data->role_name}}</option>
                        @endforeach
                    </select>

                    @error('role')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-2 mb-2">
                    <label for="selectGender">{{ trans('dicts.Gender')}}</label>

                    @foreach ($gender_data as $data)

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="{{$data->gender_desc}}" checked>
                            <label class="form-check-label" for="">
                            {{$data->gender_desc}}
                            </label>
                        </div>
                    @endforeach

                    @error('gender')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{ trans('dicts.Display Picture')}}</label>
                    <input type="file" class="form-control" name="display_picture" id="display_picture"/>
                </div>

                <div class="form-group">
                    <label for="">{{ trans('dicts.Password')}}</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>

                    @error('password')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">{{ trans('dicts.Confirm Password')}}</label>
                    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Password" required>

                    @error('confirm_password')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center mt-2">
                    <input type="submit" value="Register" class="btn btn-success">
                    <p>{{ trans('dicts.Already Register?')}}
                        <a href="/login">{{ trans('dicts.Sign In Here')}}</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
