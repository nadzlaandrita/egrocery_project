<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function addCart(Request $request, $item_id)
    {
        App::setlocale(session('lang'));
        
        $item_data = Item::find($request->id);

        $order_data = Order::all()->where('user_id', '=', Auth::user()->id)->where('item_id', '=', $item_id)->first();

        // dd($item_data);

        if($order_data == null){

            Order::insert([
                'user_id' => Auth::user()->id,
                'item_id' => $item_id,
                'price' => $item_data->price
            ]);
        }

        return redirect('/cart');
    }

    public function loadCart(){
        App::setlocale(session('lang'));

        $order_data = Order::all()->where('user_id', '=', Auth::user()->id);

        // dd($order_data);

        $total_price = 0;
        foreach($order_data as $data){
            $total_price += $data->item->price;
        }
        
        // dd($total_price);
        return view('user.cart', [
            'order_data' => $order_data,
            'total_price' => $total_price
        ]);
    }

    public function removeCart($item_id)
    {
        App::setlocale(session('lang'));

        //Delete Cart
        $order_data = Order::where('item_id', '=', $item_id);
        $order_data->delete();
        return redirect('/cart');
    }

    public function loadSuccessPage(){
        App::setlocale(session('lang'));
        return view('user.success');
    }

    public function toSuccess(){
        App::setlocale(session('lang'));

        $order_data = Order::where('user_id', '=', Auth::user()->id);

        if($order_data == null){
            return redirect('/cart');
        }else{
            $order_data->delete();
            return redirect('/checkout');
        }

    }
}
