@extends('admin.navbar')

@section('title', 'cart')

@section('content')

<div class="my-chart d-flex justify-content-center">
    <h1>My Cart</h1>
</div>

<div class="view-price d-flex justify-content-end m-3">
    <h5>Total Price: {{$total_price}}</h5>

    <form action="/history" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary">checkout</button>
    </form>

</div>

<div class="card-group mt-3" style="height: 800px; width: 1200px; ">
    <div class="d-flex row row-cols-2 row-cols-md-4 g-3 m-2">
        @foreach($cart_data as $item)
            <div class="card m-3" style="width: 18rem">
                <img class="card-img-top" src="{{ url($item->product->image)}}" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">{{$item->product->name}}</h5>
                    <p class="card-text">Rp. {{$item->product->price}}</p>
                    <p class="card-text">Qty: {{$item->qty_cart}}</p>

                    <a href="/edit-cart/{{$item->product_id}}" class="btn btn-primary">Edit Cart</a>

                    <form action="/remove-cart/{{$item->product_id}}" method="POST">

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