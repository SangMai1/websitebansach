<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $sachid = $request->id;
        $quantity = $request->quantity;
        $product_info = DB::table('sachs')
            ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
            ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
            ->where('sachs.id', '=', $sachid)
            ->first();
        $data['id'] = $sachid;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['weight'] = "123";
        $data['options']['image'] = $product_info->file_path;
        Cart::add($data);
        return Redirect::to('/api/mua-sach/show-cart');
    }

    public function show_cart(Request $request){
        return view('/mua-sach/gio-hang');
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/api/mua-sach/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/api/mua-sach/show-cart');
    }
}
