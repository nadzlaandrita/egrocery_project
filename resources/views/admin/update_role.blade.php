@extends('admin.navbar')

@section('title', 'update-role')

@section('content')


<div class="mt-5 d-flex" style="justify-content:center; align-items:center">
    <div class="card mb-3" style="width: 20rem">

        <h2>{{$user_data->first_name}} {{$user_data->last_name}}</h2>
        
        <label for="">{{ trans('dicts.Role')}}</label>
        <form action="/update-role/{{$user_data->id}}" method="POST">
            @method('PATCH')
            @csrf

            <select class="form-select" name="role_id" aria-label="Default select example">
                <option selected>{{ trans('dicts.Choose the new role')}}</option>
                @foreach($role_data as $data)
                    <option value="{{$data->id}}">{{$data->role_name}}</option>
                @endforeach
            </select>

            
            <br>
            <br>
            
            <div class="text-center">
                <input type="submit" value="{{ trans('dicts.Save')}}" class="btn btn-warning">
            </div>
        </form>
    </div>
</div>

@endsection