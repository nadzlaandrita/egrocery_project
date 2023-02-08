@extends('admin.navbar')

@section('title', 'update-role')

@section('content')


<div class="mt-5 d-flex" style="justify-content:center; align-items:center">
    <div class="card mb-3" style="width: 20rem">

        @foreach($user_data)
            <h2>{{$user_data->first_name}} {{$user_data->last_name}}</h2>
            
            <label for="">Role</label>
            <form action="{{url('/update-role/{{$user_data->id}}')}}">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Choose the new role</option>
                    @foreach($role_data as $data)
                    <option value="{{$data->role_name}}">{{$data->role_name}}</option>
                    @endforeach
                </select>
            </form>

        @endforeach

        <br>
        <br>

        <div class="text-center">
            <a href="#" class="btn btn-warning">Save</a>
        </div>
    </div>
</div>

@endsection