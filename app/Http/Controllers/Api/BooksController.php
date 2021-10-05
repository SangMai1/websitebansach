<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestBooks;
use App\Models\danhmucs;
use App\Models\nhapkhos;
use App\Models\sachs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/book/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('sachs')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create()
    {
        $danhmuc = danhmucs::pluck('name', 'id');
        $username = Session::get('username');
        return view('/book/create', compact(['danhmuc', 'username']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBooks $request)
    {
        $request->file->store('img', 'public');
        $sach = new sachs();
        $sach->code = $this->getCodeBook();
        $sach->name = $request->name;
        $sach->file_path = $request->file->hashName();
        $sach->id_danhmuc = $request->id_danhmuc;
        $sach->create_by = Auth::user()->id;
        $sach->update_by = Auth::user()->id;
        $sach->save();

        $nhapkho = new nhapkhos();
        $nhapkho->code = $this->getCodeNhapKho();
        $nhapkho->id_sach = $sach->id;
        $nhapkho->quantity = $request->quantity;
        $nhapkho->price = $request->price;
        $nhapkho->create_by = Auth::user()->id;
        $nhapkho->update_by = Auth::user()->id;

        $nhapkho->save() ? Toastr::success('Thêm mới thành công', 'Success') : Toastr::error('Thêm mới thất bại', 'Error');
        
        return redirect()->route('books.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $danhmuc = danhmucs::pluck('name', 'id');
        $sachs = sachs::find($request->id);
        $username = Session::get('username');
        return view('/book/update', compact(['danhmuc', 'sachs', 'username']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sachs = sachs::find($request->id);
        $sachs->name = $request->name;
        
        if($request->file_path != ''){        
            $path = public_path().'/storage/img/';

            //code for remove old file
            if($sachs->file_path != ''  && $sachs->file_path != null){
                $file_old = $path.$sachs->file_path;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file_path;
            $filename = $file->hashName();
            $file->move($path, $filename);

            //for update in table
            $sachs["file_path"] = $filename;
        }
        
        $sachs->id_danhmuc = $request->id_danhmuc;
        $sachs->update();
        
        $nhapkhos = nhapkhos::where('id_sach', $request->id)->first();
        $nhapkhos->quantity = $request->quantity;
        $nhapkhos->price = $request->price;
        $nhapkhos->update() ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        return redirect()->route('books.list'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        nhapkhos::destroy('id_sach', $id);
        sachs::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('books.list'); 
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('sachs')
                    ->where('sachs.name', 'LIKE', '%' . $search . '%')
                    ->where('sachs.deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('books.list'); 
        }
    }

    private function getCodeBook()
    {
        return "S" . DB::table('sachs')->max('id');     
    }

    private function getCodeNhapKho()
    {
        return "NK" . DB::table('nhapkhos')->max('id');     
    }
}
