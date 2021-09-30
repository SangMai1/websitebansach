<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\danhmucs;
use App\Models\nhapkhos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/warehouse/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('nhapkhos')
                ->select('nhapkhos.id as id', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('sachs', 'sachs.id', '=', 'nhapkhos.id_sach')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('nhapkhos.deleted_at', null)
                ->orderByDesc('nhapkhos.id')
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
        $danhmuc = danhmucs::pluck('name', 'id');
        $nhapkhos = DB::table('nhapkhos')
                ->select('nhapkhos.id as id','sachs.name as name', 'sachs.id_danhmuc as id_danhmuc', 
                'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('sachs', 'sachs.id', '=', 'nhapkhos.id_sach')
                ->where('nhapkhos.id', '=' , $request->id)
                ->first();
        return view('/warehouse/update', compact(['danhmuc', 'nhapkhos', 'username']));
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
        $nhapkhos = nhapkhos::find($id);
        $nhapkhosEdit = $request->all();
        $nhapkhos->update($nhapkhosEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        return redirect()->route('warehouse.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('nhapkhos')
                    ->select('nhapkhos.id as id', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                    ->join('sachs', 'sachs.id', '=', 'nhapkhos.id_sach')
                    ->where('sachs.name', 'LIKE', '%' . $search . '%')
                    ->where('nhapkhos.deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('warehouse.list'); 
        }
    }
}
