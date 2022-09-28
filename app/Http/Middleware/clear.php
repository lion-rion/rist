<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;

class clear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //アクセスしたユーザーがそのページへのアクセス権利を持っているかどうかを判定する
        $user = Auth::user();
        $clear = Stage::where('user_id', $user->id)->first();
        //dd($posts);
        if($clear->sql==1){
            return $next($request);
        }else{
            abort(404);
        }
    }
}
