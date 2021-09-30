<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestReview;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviewSach = DB::table('reviews')
                    ->select('reviews.id as id', 'customers.name as name', 'reviews.content as content', 'reviews.created_at as created_at')
                    ->join('customers', 'customers.id', '=', 'reviews.customer_id')
                    ->join('sachs', 'sachs.id', '=', 'reviews.sach_id')
                    ->where('sachs.id', $request->id)
                    ->get();
        return response()->json($reviewSach);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestReview $request)
    {
        $review = new reviews();
        $customer_id = Session::get('customer_id');
        $review->customer_id = $customer_id;
        $review->sach_id = $request->sach_id;
        $review->content = $request->content;
        $review->save();
    }

    public function get_list()
    {
        $username = Session::get('username');
        return view('/comment/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('reviews')
                ->select('reviews.id as id', 'customers.name as name_customer', 'sachs.name as name_book', 'reviews.content as content', 'reviews.review_parent_review as review_parent_review', 'reviews.created_at as create_at')
                ->join('customers', 'customers.id', '=', 'reviews.customer_id')
                ->join('sachs', 'sachs.id', '=', 'reviews.sach_id')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('reviews.deleted_at', null)
                ->orderByDesc('reviews.id')
                ->get();
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        reviews::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('review.getlist'); 
    }
}
