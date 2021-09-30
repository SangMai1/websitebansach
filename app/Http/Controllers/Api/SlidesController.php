<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSlide;
use App\Models\slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/slide/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('slides')
                ->limit($request['limit'])
                ->offset($request['start'])
                ->where('deleted_at', null)
                ->orderByDesc('id')
                ->get();
        return response()->json($result);
    }

    public function create(){
        $username = Session::get('username');
        return view('/slide/create', compact(['username']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSlide $request)
    {
        $request->file->store('img', 'public');
        $slide = new slides();
        $slide->code=$this->getCodeSlide();
        $slide->name=$request->name;
        $slide->file_path=$request->file->hashName();
        $slide->create_by= 1;
        $slide->update_by= 1;
        $slide->save() ? Toastr::success('Thêm mới thành công', 'Success') : Toastr::error('Thêm mới thất bại', 'Error');
        return redirect()->route('slides.list');
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
        $slides = slides::find($request->id);
        return view('/slide/update', compact(['slides', 'username']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSlide $request, $id)
    {
        $slides = slides::find($id);
        $slidesEdit = $request->all();
        
        if($request->file_path != ''){        
            $path = public_path().'/storage/img/';

            //code for remove old file
            if($slides->file_path != ''  && $slides->file_path != null){
                $file_old = $path.$slides->file_path;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file_path;
            $filename = $file->hashName();
            $file->move($path, $filename);

            //for update in table
            $slidesEdit["file_path"] = $filename;
        }
        
        $slides->update($slidesEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        
        return redirect()->route('slides.list'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slides::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('slides.list'); 
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('slides')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->where('deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('slides.list'); 
        }
    }

    private function getCodeSlide()
    {
        return "SL" . DB::table('slides')->max('id');     
    }
}
