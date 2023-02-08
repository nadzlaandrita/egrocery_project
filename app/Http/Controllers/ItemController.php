<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function loadItemPage(){

        App::setlocale(session('lang'));

        $item_data = DB::table('items')->get();
        $item_data = Item::paginate(10);

        // dd($item_data);
        
        if(Auth::user()->role->role_name == 'admin'){
            return view('admin.home', [
                'item_data' => $item_data
            ]);
        }else if(Auth::user()->role->role_name == 'user'){
            return view('user.home', [
                'item_data' => $item_data
            ]);
        }
        
    }

    public function loadDetailItem($id){
        App::setlocale(session('lang'));
        
        $detail_data = DB::table('items')->get()->where('id', $id);

        if($detail_data->contains('id', $id)){
            if(Auth::user()->role->role_name == 'admin'){
                return view('admin.detail_item', [
                    'detail_data' => $detail_data
                ]);
            }else if(Auth::user()->role->role_name == 'user'){
                return view('user.detail_item', [
                    'detail_data' => $detail_data
                ]);
            }
        }
    }
}
