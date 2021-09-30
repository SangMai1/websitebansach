<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\danhmucs;
use App\Models\sachs;
use App\Models\slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TrangChuController extends Controller
{
    public function home_website()
    {
        $slides = slides::all();
        $danhmucs = danhmucs::all();
        $sachs = DB::table('sachs')
                ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                ->limit(8)
                ->orderByDesc('sachs.id')
                ->get();
        return view("/mua-sach/trang-chu", compact(['slides', 'danhmucs', 'sachs']));
    }

    public function book_all()
    {
        $danhmucs = danhmucs::all();
        $sachs = DB::table('sachs')
                ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                ->get();
        return view('/mua-sach/tat-ca-sach', compact(['sachs', 'danhmucs']));
    }

    public function book_in_categories(Request $request)
    {
        $danhmucs = danhmucs::all();
        $sachdanhmuc = DB::table('sachs')
                ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                ->where('sachs.id_danhmuc', '=', $request->id)
                ->get();
        return view('/mua-sach/sach-theo-danh-muc', compact(['sachdanhmuc', 'danhmucs']));
    }

    public function book_details(Request $request)
    {
        $danhmucs = danhmucs::all();
        $chitietsach = DB::table('sachs')
                    ->select('sachs.id as id', 'sachs.file_path as file_path', 'sachs.name as name', 'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                    ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                    ->where('sachs.id', '=', $request->id)
                    ->first(); 
        return view('/mua-sach/chi-tiet-sach', compact(['chitietsach', 'danhmucs']));
    }
}
