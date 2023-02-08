@extends('user.navbar')

@section('title', 'cart')

@section('content')

<div class="my-chart d-flex justify-content-center">
    <h1>My Cart</h1>
</div>

<div class="view-price d-flex justify-content-end m-3">
    <h5>Total Price: {{$total_price}}</h5>

    <form action="/checkout" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-warning">Check Out</button>
    </form>

</div>

<div class="card-group mt-3" style="height: 400px; width: 1200px; ">
    <div class="d-flex row row-cols-2 row-cols-md-4 g-3 m-2">
        @foreach($order_data as $data)
            <div class="card m-3" style="width: 18rem">
                <img class="card-img-top" src="https://cdn.icon-icons.com/icons2/2337/PNG/512/asian_food_vegetables_salad_bowl_icon_142409.png" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">{{$data->item->item_name}}</h5>
                    <p class="card-text">Rp. {{$data->price}}</p>

                    <form action="/remove-cart/{{$data->item_id}}" method="POST">

                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger d-flex ">
                            Remove from Cart
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    h5 {
        margin-right: 15px;
        margin-top: 1%;
    }
    .btn{
        padding-left: 5px;
    }
    img{
        margin:auto;
        width: 200px;
        height:250px
    }
</style>
@endsection