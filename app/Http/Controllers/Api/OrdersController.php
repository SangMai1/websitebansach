<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/order-admin/list-order', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('orders')
                ->select('orders.id as id', 'customers.name as name', 'orders.total as total', 'orders.status as status')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('orders.deleted_at', null)
                ->orderByDesc('orders.id')
                ->get();
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $username = Session::get('username');
        $orders = orders::find($request->id);
        return view('/order-admin/update-order', compact(['orders', 'username']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = orders::find($id);
        $orderEdit = $request->all();
        $order->update($orderEdit);
        return redirect()->route('orderadmin.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        orders::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('orderadmin.list');
    }

    public function details_order(Request $request){
        $username = Session::get('username');
        $details_order = DB::table('orders')
                        ->select('customers.name as name_customer', 'customers.email as email_customer', 
                        'customers.phone as phone_customer', 'shippings.address as address')
                        ->join('customers', 'customers.id', '=', 'orders.customer_id')
                        ->join('shippings', 'shippings.id', '=', 'orders.shipping_id')
                        ->where('orders.id', $request->id)
                        ->where('orders.deleted_at', null)
                        ->get();
        $product_order = DB::table('order_details')
                        ->where('order_id', $request->id)
                        ->get();
        return view('/order-admin/detail-order', compact(['details_order', 'product_order', 'username']));
    }
}
