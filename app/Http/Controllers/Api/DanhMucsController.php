<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestDanhMucs;
use App\Models\danhmucs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/danh-muc/danh-sach');
    }

    public function more_data(Request $request){
        $result = DB::table('danhmucs')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create(){
        return view('/danh-muc/them-moi');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDanhMucs $request)
    {
        $danhmucs = new danhmucs();
        $danhmucs->code = $this->getCodeDanhMuc();
        $danhmucs->name = $request->name;
        $danhmucs->create_by = 1;
        $danhmucs->update_by = 1;
        $request->session()->flash('message', $danhmucs->save() ? 'Thêm mới thành công!' : 'Thêm mới thất bại!');
        
        return redirect()->route("danhmucs.list");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $danhmucs = danhmucs::find($request->id);
        return view('/danh-muc/cap-nhat', compact(['danhmucs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDanhMucs $request, $id)
    {
        $danhmucs = danhmucs::find($id);
        $danhmucsEdit = $request->all();
        $danhmucs->update($danhmucsEdit);
        return redirect()->route('danhmucs.list');
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

    private function getCodeDanhMuc(){
        return "DM" . DB::table('danhmucs')->max('id');     
    }
}
