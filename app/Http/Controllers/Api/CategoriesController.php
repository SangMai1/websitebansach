<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCategories;
use App\Models\danhmucs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/categories/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('danhmucs')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create()
    {
        $username = Session::get('username');
        return view('/categories/create', compact(['username']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategories $request)
    {
        $danhmucs = new danhmucs();
        $danhmucs->code = $this->getCodeCategories();
        $danhmucs->name = $request->name;
        $danhmucs->create_by = 1;
        $danhmucs->update_by = 1;
        $danhmucs->save() ? Toastr::success('Thêm mới thành công', 'Success') : Toastr::error('Thêm mới thất bại', 'Error');
        
        return redirect()->route("categories.list");
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
        $danhmucs = danhmucs::find($request->id);
        return view('/categories/update', compact(['danhmucs', 'username']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCategories $request, $id)
    {
        $danhmucs = danhmucs::find($id);
        $danhmucsEdit = $request->all();
        $danhmucs->update($danhmucsEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        return redirect()->route('categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        danhmucs::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('categories.list'); 
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('danhmucs')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->where('deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('categories.list'); 
        }
    }

    private function getCodeCategories()
    {
        return "DM" . DB::table('danhmucs')->max('id');     
    }
}
