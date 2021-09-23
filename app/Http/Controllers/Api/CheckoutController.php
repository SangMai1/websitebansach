<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCustomers;
use App\Http\Requests\RequestShippings;
use App\Models\customers;
use App\Models\order_details;
use App\Models\orders;
use App\Models\payments;
use App\Models\shippings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('/mua-sach/login-check-out');
    }

    public function add_customer(RequestCustomers $request){
        $customer = new customers();
        $customer->code = $this->getCodeCustomer();
        $customer->name = $request->account_name;
        $customer->email = $request->account_email;
        $customer->password = md5($request->account_password);
        $customer->phone = $request->account_phone;
        $customer->save();
        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);

        return Redirect('/api/mua-sach/checkout');
    }

    public function checkout(){
        return view('/mua-sach/show-check-out');
    }

    public function save_checkout_customer(RequestShippings $request){
        $shipping = new shippings();
        $shipping->email = $request->shipping_email;
        $shipping->name = $request->shipping_name;
        $shipping->address = $request->shipping_address;
        $shipping->phone = $request->shipping_phone;
        $shipping->notes = $request->shipping_notes;
        $shipping->save();
        
        Session::put('shipping_id', $shipping->id);

        return Redirect('/api/mua-sach/payment');
    }

    public function payment(){
        return view('/mua-sach/pay-ment');
    }

    public function order_place(Request $request){
        // insert payment
        $payment = new payments();
        $payment->method = $request->payment_option;
        $payment->status = 0;
        $payment->save();
        
        // insert order
        $order = new orders();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = Session::get('shipping_id');
        $order->payment_id = $payment->id;
        $order->total = Cart::subtotal();
        $order->status = 0;
        $order->save();

        // insert order_detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail = new order_details();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $v_content->id;
            $order_detail->product_name = $v_content->name;
            $order_detail->product_price = $v_content->price;
            $order_detail->product_quantity = $v_content->qty;
            $order_detail->save();
        }

        if($payment->method == 1){
            echo "Thanh toán bằng thẻ ATM";
        } else if($payment->method == 2){
            Cart::destroy();
            return view("/mua-sach/handcash");
        } else {
            echo "Thanh toán bằng paypal";
        }
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect('/api/mua-sach/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customers')
                ->where('email', $email)
                ->where('password', $password)
                ->first();
        if($result){
            Session::put('customer_id', $result->id);
            return Redirect('/api/mua-sach/checkout');
        } else {
            return Redirect('/api/mua-sach/login-checkout');
        }
    }

    private function getCodeCustomer(){
        return "KH" . DB::table('customers')->max('id'); 
    }
}
