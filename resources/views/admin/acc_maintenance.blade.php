@extends('admin.navbar')

@section('title', 'account-maintenance')

@section('content')

<div class="d-flex justify-content-center text-center align-items-center">

  <div class="col-auto">

    <table class="table table-responsive mt-5">
        <thead>
          <tr>
            <th scope="col">Account</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user_data as $data)
            <tr>
              <td>{{$data->first_name}} {{$data->last_name}} - {{$data->role->role_name}}</td>
              <td>
                
                <a href="/update-role/{{$data->id}}" type="submit" class="btn btn-outline-warning">Update Role</a>
                
                <br>
                <br>

                <form action="/delete-account/{{$data->id}}" method="POST">
                  @method('DELETE')
                  @csrf
                  
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>

@endsection