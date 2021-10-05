<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use App\Models\chucnangs;
use App\Models\User;
use App\Models\userandmissons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Session::get('username');
        return view('/user/list', compact(['username']));
    }

    public function more_data(Request $request)
    {
        $result = DB::table('users')
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
        $idChucNang = chucnangs::pluck('name', 'id');
        return view('/user/create', compact(['idChucNang', 'username']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestUser $request)
    {
        $user = new User();
        $user->code=$this->getCodeUser();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->gender=$request->gender;
        $user->date_of_birth=$request->date_of_birth;
        $user->phone=$request->phone;
        $user->cmnd=$request->cmnd;
        $user->address=$request->address;
        $user->create_by= Auth::user()->id;
        $user->update_by= Auth::user()->id;
        $user->save() ? Toastr::success('Thêm mới thành công', 'Success') : Toastr::error('Thêm mới thất bại', 'Error');

        $iduser = $user->id;
        $missionid = $request->input('chucnangs');
        if($missionid != null){
            foreach($missionid as $miss) {
                $userandmission = new userandmissons();
                $userandmission->id_user=$iduser;
                $userandmission->id_misson=$miss;
                $userandmission->save();
            }
        }

        return redirect()->route('user.list');
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
        $users = User::find($request->id);
        $idChucNang = chucnangs::pluck('name', 'id');
        $chucNangCheck = DB::table('userandmissons')->where('id_user', $request->id)->get();
        return view('/user/update', compact(['users', 'idChucNang', 'chucNangCheck', 'username'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUser $request, $id)
    {
        $users = User::find($id);
        $usersEdit = $request->all();
        userandmissons::where('id_user', $request->id)->delete();
        $users->update($usersEdit) ? Toastr::success('Cập nhật thành công', 'Success') : Toastr::error('Cập nhật thất bại', 'Error');
        
        $iduser = $users->id;
        $missionid = $request->input('chucnangids');
        if($missionid != null){
            foreach($missionid as $miss) {
                $userandmission = new userandmissons();
                $userandmission->id_user=$iduser;
                $userandmission->id_misson=$miss;
                $userandmission->save();
            }
        }

        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id) ? Toastr::success('Xóa thành công', 'Success') : Toastr::error('Xóa thất bại', 'Error');
        return redirect()->route('user.list'); 
    }

    public function search(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            $result = DB::table('users')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->where('deleted_at', null)
                    ->get();
            return response()->json($result);
        } else {
            return redirect()->route('user.list'); 
        }
    }

    private function getCodeUser()
    {
        return "NV" . DB::table('users')->max('id');     
    }
}
