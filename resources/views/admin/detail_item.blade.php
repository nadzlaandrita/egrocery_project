@extends('admin.navbar')

@section('title', 'detail_item')

@section('content')

<div class="px-5 d-flex" style="justify-content:center; align-items:center">
    
    <div class="card mt-3 mb-3 d-flex" style="max-width: 1200px; ">
        <div class="row g-0">
            @foreach($detail_data as $data)
                <div class="col-md-4">
                        <img src="https://cdn.icon-icons.com/icons2/2337/PNG/512/asian_food_vegetables_salad_bowl_icon_142409.png" class="img-fluid rounded-start" alt="..." style="">
                </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{$data->item_name}}</h3>
                            <h4 class="card-text">Rp. {{$data->price}}</h4>
                            <p class="card-text">{{$data->item_desc}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mx-2 mb-2">
                <button class="btn btn-success" type="submit">Add to Cart</button>
            </div>
        </div>
    </div>



@endsection