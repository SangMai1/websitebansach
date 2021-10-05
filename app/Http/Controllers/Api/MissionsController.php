<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestMission;
use App\Models\chucnangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = session()->get("username");
        return view('/mission/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('chucnangs')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create(){
        $username = Session::get('username');
        return view('/mission/create', compact(['username']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestMission $request)
    {
        $chucNang = new chucnangs();
        $chucNang->code = $this->getCodeMission();
        $chucNang->name = $request->name;
        $chucNang->route = $request->route;
        $chucNang->create_by = Auth::user()->id;
        $chucNang->update_by = Auth::user()->id;
        $chucNang->save() ? Toastr::success('Thêm mới thành công', 'Success') : Toastr::error('Thêm mới thất bại', 'Error');
        return redirect()->route('mission.list');
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
        $chucnangs = chucnangs::find($request->id);
        return view('/mission/update', compact(['chucnangs', 'username']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestMission $request, $id)
    {
        $chucnang = chucnangs::find($id);
        $chucnangEdit = $request->all();
        $chucnang->update($chucnangEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        return redirect()->route('mission.list'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chucnangs::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('mission.list'); 
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('chucnangs')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->where('deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('mission.list'); 
        }
    }

    private function getCodeMission()
    {
        return "CN" . DB::table('chucnangs')->max('id');     
    }
}
