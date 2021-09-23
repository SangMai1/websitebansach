<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestNhapKhos;
use App\Http\Requests\RequestSachs;
use App\Models\danhmucs;
use App\Models\nhapkhos;
use App\Models\sachs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SachsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/sach/danh-sach');
    }

    public function more_data(Request $request){
        $result = DB::table('sachs')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create(){
        $danhmuc = danhmucs::pluck('name', 'id');
        return view('/sach/them-moi', compact(['danhmuc']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSachs $request)
    {
        $request->file->store('img', 'public');
        $sach = new sachs();
        $sach->code=$this->getCodeSach();
        $sach->name=$request->name;
        $sach->file_path=$request->file->hashName();
        $sach->id_danhmuc = $request->id_danhmuc;
        $sach->create_by= 1;
        $sach->update_by= 1;
        $sach->save();

        $nhapkho = new nhapkhos();
        $nhapkho->code = $this->getCodeNhapKho();
        $nhapkho->id_sach = $sach->id;
        $nhapkho->quantity = $request->quantity;
        $nhapkho->price = $request->price;
        $nhapkho->create_by= 1;
        $nhapkho->update_by= 1;

        $request->session()->flash('message', $nhapkho->save() ? 'Thêm mới thành công!' : 'Thêm mới thất bại!');
        
        return redirect()->route('sachs.list');
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
        $sachs = DB::table('sachs')
                ->select('sachs.id as id','sachs.name as name', 'sachs.file_path as file_path', 'nhapkhos.id_danhmuc as id_danhmuc', 
                'nhapkhos.quantity as quantity', 'nhapkhos.price as price')
                ->join('nhapkhos', 'nhapkhos.id_sach', '=', 'sachs.id')
                ->where('sachs.id', '=' , $request->id)
                ->first();
        return view('/sach/cap-nhat', compact(['danhmuc', 'sachs']));
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
        $nhapkhos->update();
        return redirect()->route('sachs.list'); 
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

    private function getCodeSach(){
        return "S" . DB::table('sachs')->max('id');     
    }

    private function getCodeNhapKho(){
        return "NK" . DB::table('nhapkhos')->max('id');     
    }
}
