<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\danhmucs;
use App\Models\sachs;
use App\Models\slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function trangchu(){
        $slides = slides::all();
        $danhmucs = danhmucs::all();
        $sachs = DB::table('sachs')
                ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                ->get();
        return view("/mua-sach/trang-chu", compact(['slides', 'danhmucs', 'sachs']));
    }

    public function tatcasach(){
        $sachs = sachs::all();
        return view('/mua-sach/tat-ca-sach', compact(['sachs']));
    }

    public function sachtheodanhmuc(Request $request){
        $sachdanhmuc = sachs::where('id_danhmuc', '=', $request->id)->get();
        return view('/mua-sach/sach-theo-danh-muc', compact(['sachdanhmuc']));
    }

    public function chitietsach(Request $request){
        $chitietsach = DB::table('sachs')
                    ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                    ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                    ->where('sachs.id', '=', $request->id)
                    ->first();
        return view('/mua-sach/chi-tiet-sach', compact(['chitietsach']));
    }
}
