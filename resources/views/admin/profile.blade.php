@extends('admin.navbar')

@section('title', 'profile-user')

@section('content')

<div class="px-5 d-flex mt-3" style="justify-content:center; align-items:center">
    <div class="card mb-3 border border-2 border-success" style="max-width: auto;">
        @foreach($user_data as $data)
        <div class="row g-0">
            
            <div class="col-md-4">
                <img src="{{ url($data->display_picture_link) }}" class="img-fluid rounded-start" alt="{{$data->first_name}}">
            </div>
            <div class="col-md-8">

                <form class=" mx-2 mt-2 row g-3" method="POST" action="{{url('/update-profile')}}" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}

                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ trans('dicts.First Name')}}</label>
                        <input type="text" name="first_name" class="form-control" id="" value="{{$data->first_name}}">

                        @error('first_name')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ trans('dicts.Last Name')}}</label>
                        <input type="text" name="last_name" class="form-control" id="" value="{{$data->last_name}}">

                        @error('last_name')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">{{ trans('dicts.Email')}}</label>
                        <input type="email" name="email" class="form-control" id="" value="{{$data->email}}" >

                        @error('email')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="" class="form-label">{{ trans('dicts.Role')}}</label>
                        <label type="text" name="role" class="form-control" id="inputAddress" placeholder="">{{$data->role->role_name}} </label>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">{{ trans('dicts.Gender')}}</label>
                        @foreach($gender_data as $gender)
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="{{$gender->gender_desc}}" checked>
                            <label class="form-check-label" for="">
                                {{$gender->gender_desc}}
                            </label>

                        @endforeach
                        @error('gender')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">{{ trans('dicts.Display Picture')}}</label>
                        <input type="file" class="form-control" name="display_picture_link" id="display_picture"/>

                        @error('display_picture_link')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">{{ trans('dicts.Old Password')}}</label>
                        <input type="password" name="old_password" class="form-control" id="" placeholder="">

                        @error('old_password')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">{{ trans('dicts.New Password')}}</label>
                        <input type="password" name="new_password" class="form-control" id="" placeholder="">

                        @error('new_password')
                        <div class="alert alert-dismissible alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 col-md-6 mx-auto">
                        <button type="submit" class="btn btn-warning">{{ trans('dicts.Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>
    
@endsection