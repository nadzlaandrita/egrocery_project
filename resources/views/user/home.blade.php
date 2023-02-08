@extends('user.navbar')

@section('title', 'home-user')

@section('content')

<div class="mt-3 row d-flex" style="justify-content: center; align-items:center">
    @foreach($item_data as $data)
    <div class="card" style="width: 17rem;">
        <div class="card-body">
            <img src="https://cdn.icon-icons.com/icons2/2337/PNG/512/asian_food_vegetables_salad_bowl_icon_142409.png" class="card-img-top" alt="...">
            <h5 class="card-title">{{$data->item_name}}</h5>
            <h6 class="card-text">Rp.{{$data->price}}</h6>
            <a href="/detail-item/{{$data->id}}" class="btn btn-warning">More Detail</a>
        </div>
    </div>
    @endforeach
    
</div>

<div class="d-flex justify-content-center" style="align-content: center">
    {{$item_data->links()}}
</div>

@endsection