<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\carts;
use App\Models\danhmucs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $sachid = $request->id;
        $quantity = $request->quantity;
        $customer_id = Session::get('customer_id');
        $product_info = DB::table('sachs')
            ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
            ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
            ->where('sachs.id', '=', $sachid)
            ->first();

        $cart = new carts();
        $cart->customer_id = $customer_id;
        $cart->product_id = $sachid;
        $cart->product_name = $product_info->name;
        $cart->product_price = $product_info->price;
        $cart->product_quantity = $quantity;
        $cart->status = 0;
        $cart->save();
        Toastr::success('Thêm mới sản phẩm thành công', 'Success');
        return Redirect::to('/api/mua-sach/show-cart');
    }

    public function show_cart(Request $request)
    {
        $danhmucs = danhmucs::all();
        $customer_id = Session::get('customer_id');
        
        $cart_buy_later = DB::table('carts')
                        ->select('carts.id as id', 'sachs.file_path as file_path', 'carts.product_name as product_name', 'carts.product_price as product_price', 'carts.product_quantity as product_quantity')
                        ->join('sachs', 'sachs.id', '=', 'carts.product_id')
                        ->where('carts.customer_id', $customer_id)
                        ->where('carts.deleted_at', null)
                        ->get();
        $count_cart = carts::where('customer_id', $customer_id)
                            ->where('deleted_at', null)
                            ->sum('product_quantity');
        
        Session::put('count_cart', $count_cart);
        return view('/mua-sach/gio-hang', compact(['danhmucs', 'customer_id', 'cart_buy_later', 'count_cart']));
    }

    public function update_cart_quantity(Request $request)
    {
        $carts = carts::find($request->rowId_cart);
        $carts->product_quantity = $request->cart_quantity;
        $carts->update();
        Toastr::success('Cập nhật sản phẩm thành công', 'Success');
        return Redirect::to('/api/mua-sach/show-cart');
    }

    public function delete_to_cart($rowId)
    {
        carts::destroy($rowId);
        // Cart::update($rowId, 0);
        Toastr::success('Xóa sản phẩm thành công', 'Success');
        return redirect()->back();
    }
}
