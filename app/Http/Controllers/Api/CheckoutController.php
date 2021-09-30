<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCustomers;
use App\Http\Requests\RequestShippings;
use App\Models\carts;
use App\Models\change_product_orders;
use App\Models\customers;
use App\Models\danhmucs;
use App\Models\order_details;
use App\Models\orders;
use App\Models\payments;
use App\Models\shippings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

session_start();

class CheckoutController extends Controller
{

    private static function send_mail($to_email, $name_title, $body)
    {
        $to_name = "Website bán sách online";
        $data = array('name'=>$name_title, 'body'=>$body);
        Mail::send('mua-sach.send-mail', $data, function($message) use ($to_name, $to_email){
            $message->to($to_email)->subject($to_name);
            $message->from($to_email, $to_name);
        });
    }

    public function register_checkout()
    {
        $danhmucs = danhmucs::all();
        return view('/mua-sach/register-check-out', compact(['danhmucs']));
    }

    public function login_checkout()
    {
        $danhmucs = danhmucs::all();
        return view('/mua-sach/login-check-out', compact(['danhmucs']));
    }

    public function add_customer(RequestCustomers $request)
    {
        $customer = new customers();
        $customer->code = $this->getCodeCustomer();
        $customer->name = $request->account_name;
        $customer->email = $request->account_email;
        $customer->password = md5($request->account_password);
        $customer->phone = $request->account_phone;
        $customer->save();

        $name_title = 'Quý khách đã đăng ký thành công';
        $body = 'Bạn chỉ cần đặt, mọi thứ chúng tôi sẽ lo';
        CheckoutController::send_mail($customer->email, $name_title, $body);

        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);
        Session::put('customer_email', $customer->email);
        $shipping = Session::get('shipping_id');
        if($shipping != null){
            return Redirect('/api/mua-sach/checkout');
        } else if($shipping == null){
            return Redirect('/api/mua-sach/trang-chu');
        } else {
            return Redirect('/api/mua-sach/register-checkout');
        }
    }

    public function find_customer()
    {
        $danhmucs = danhmucs::all();
        $customer_id = Session::get('customer_id');
        $customer = customers::find($customer_id);
        return view('/mua-sach/user-information', compact(['customer', 'danhmucs']));
    }

    public function update_customer(Request $request, $id)
    {
        $customer = customers::find($id);
        $customerEdit = $request->all();
        $customer->update($customerEdit);
        return Redirect('/api/mua-sach/edit-customer');
    }

    public function order_product()
    {
        $danhmucs = danhmucs::all();
        $customer_id = Session::get('customer_id');
        $product_order = DB::table('order_details')
                        ->select('order_details.id as id', 'order_details.product_name as name', 'sachs.file_path as file_path',
                            'order_details.product_quantity as quantity', 'order_details.product_price as price',
                            'orders.total as total', 'orders.status as status', 'orders.created_at as created_at')
                        ->join('orders', 'orders.id', '=', 'order_details.order_id')
                        ->join('customers', 'customers.id', '=', 'orders.customer_id')
                        ->join('sachs', 'sachs.id', '=', 'order_details.product_id')
                        ->where('customers.id', $customer_id)   
                        ->get();
        return view('/mua-sach/product-order', compact(['danhmucs', 'product_order']));
    }

    public function checkout(Request $request)
    {
        $abc = $request->id;

        $ppp = str_replace("_", ",", $abc);

        $r = rtrim($ppp, ", ");
        
        $arr_cart = explode(",", $r);

        foreach ($arr_cart as $index => $value) {
            $arr_cart[$index] = (int)$value; 
        }
        session()->put("arr_cart", $arr_cart);
        $danhmucs = danhmucs::all();
        return view('/mua-sach/show-check-out', compact(['danhmucs']));
    }

    public function save_checkout_customer(RequestShippings $request)
    {
        $shipping = new shippings();
        $shipping->email = $request->email;
        $shipping->name = $request->name;
        $shipping->address = $request->address;
        $shipping->phone = $request->phone;
        $shipping->notes = $request->notes;
        $shipping->save();
        
        Session::put('shipping_id', $shipping->id);

        return Redirect('/api/mua-sach/payment');
    }

    public function edit_check_customer(Request $request)
    {
        $danhmucs = danhmucs::all();
        $shippings = shippings::find($request->id);
        return view('/mua-sach/update-show-check-out', compact(['danhmucs', 'shippings']));
    }

    public function update_check_customer(RequestShippings $request, $id){
        $shippings = shippings::find($id);
        $shippingsEdit = $request->all();
        $shippings->update($shippingsEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        return redirect()->route('muasach.payment');
    }

    public function payment(Request $request)
    {
        $danhmucs = danhmucs::all();
        $ship = Session::get('shipping_id');
        $db_ship = shippings::find($ship);
        $arr = Session::get('arr');
        return view('/mua-sach/pay-ment', compact(['danhmucs', 'db_ship']));
    }

    public function get_payment(Request $request)
    {        
        $result = DB::table('carts')
                        ->select('carts.id as id', 'sachs.file_path as file_path','carts.product_id as product_id', 'carts.product_name as product_name', 'carts.product_price as product_price', 'carts.product_quantity as product_quantity')
                        ->join('sachs', 'sachs.id', '=', 'carts.product_id')
                        ->where('carts.id', $request['limit'])
                        ->get();

        return response()->json($result);
    }

    public function order_place(Request $request)
    {
        // insert payment
        $payment = new payments();
        $payment->method = $request->payment_option;
        $payment->status = 0;
        $payment->save();
        
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');

        // insert order

        $user_shipping_id = DB::table('orders')
                            ->where('customer_id', $customer_id)
                            ->first();
        
        // session shipping
        $content = Session::get('arr_cart');
        $total_arr = 0;
        foreach($content as $v_content){
            $hoa = carts::where('id', $v_content)->first();
            $total_arr += $hoa->product_quantity * $hoa->product_price;
        }

        $order = new orders();
        $order->customer_id = $customer_id;
        if(isset($user_shipping_id->customer_id)){
            $order->shipping_id = $user_shipping_id->shipping_id;
        } else {
            $order->shipping_id = $shipping_id;
        }

        $order->payment_id = $payment->id;
        $order->total = $total_arr;
        $order->status = 0;
        $order->save();

        

        // insert order_detail
        
        foreach($content as $v_content){
            $hoa1 = carts::where('id', $v_content)->first();
            $order_detail = new order_details();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $hoa1->product_id;
            $order_detail->product_name = $hoa1->product_name;
            $order_detail->product_price = $hoa1->product_price;
            $order_detail->product_quantity = $hoa1->product_quantity;
            $order_detail->status = 0;
            $order_detail->save();

            carts::destroy('id', $v_content);
        }

        if($payment->method == 1){
            $danhmucs = danhmucs::all();
            return view("/mua-sach/handcash", compact(['danhmucs']));
        } else if($payment->method == 2){
            $danhmucs = danhmucs::all();
            return view("/mua-sach/handcash", compact(['danhmucs']));
        } else {
            $danhmucs = danhmucs::all();
            return view("/mua-sach/handcash", compact(['danhmucs']));
        }

        $name_title = 'Xác nhận đơn hàng';
        $body = 'Cảm ơn bạn đã mua hàng của website chúng tôi';
        $email_customer = Session::get('customer_email');
        CheckoutController::send_mail($email_customer, $name_title, $body);

        Session::flush();
    }

    public function change_product()
    {
        $danhmucs = danhmucs::all();
        $customer_id = Session::get('customer_id');
        $product_order = DB::table('order_details')
                        ->select('order_details.id as id', 'order_details.product_name as name', 'sachs.file_path as file_path',
                            'order_details.product_quantity as quantity', 'order_details.product_price as price',
                            'orders.total as total', 'orders.status as status', 'orders.created_at as created_at')
                        ->join('orders', 'orders.id', '=', 'order_details.order_id')
                        ->join('customers', 'customers.id', '=', 'orders.customer_id')
                        ->join('sachs', 'sachs.id', '=', 'order_details.product_id')
                        ->where('customers.id', $customer_id)   
                        ->get();
        return view('/mua-sach/change-product', compact(['danhmucs', 'product_order']));
    }

    public function change_product_item(Request $request)
    {
        $danhmucs = danhmucs::all();
        $order_detail_id = order_details::find($request->id);
        return view('/mua-sach/change-product-item', compact(['danhmucs', 'order_detail_id']));
    }

    public function update_change_product_item(Request $request)
    {
        $danhmucs = danhmucs::all();
        $change_product_orders = new change_product_orders();
        $change_product_orders->order_details_id = $request->order_details_id;
        $change_product_orders->reason = $request->reason;
        $change_product_orders->save();

        return view('/mua-sach/page-change-product', compact(['danhmucs']));
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/api/mua-sach/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customers')
                ->where('email', $email)
                ->where('password', $password)
                ->first();
        Session::put('customer_id', $result->id);
        Session::put('customer_name', $result->name);
        if($result){
            return Redirect('/api/mua-sach/trang-chu');
        }  else {
            return Redirect('/api/mua-sach/login-checkout');
        }
    }

    private function getCodeCustomer()
    {
        return "KH" . DB::table('customers')->max('id'); 
    }
}
