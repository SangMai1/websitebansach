<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Authencation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $mission = DB::table('chucnangs')->where('route', Route::currentRouteName())->first(); // kiểm tra chức năng
        if(isset($mission->id)) {

            $quyen = DB::table('users')
                    ->select("users.id as id", "chucnangs.route as route")
                    ->join('userandmissons', 'userandmissons.id_user', '=', 'users.id')
                    ->join('chucnangs', 'chucnangs.id', '=', 'userandmissons.id_misson')
                    ->where('users.id', Auth::user()->id)
                    ->where('chucnangs.id', $mission->id)
                    ->get();

            
            $arr = reset($quyen);
            $arr1 = reset($arr);
            
            if(empty($arr1)){
                return redirect()->route('khongco');
            }

            if($arr1->id == Auth::user()->id){
                return $next($request);
            }
            
        }

        return redirect()->route('khongco');
    }
}
