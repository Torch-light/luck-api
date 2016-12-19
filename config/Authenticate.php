<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use JWTAuth;
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         // JWTAuth::parseToken();// and you can continue to chain methods
        $user = JWTAuth::parseToken()->authenticate();
        $request['role_id']=$user['role_id'];
        $request['mark']=$user['mark'];
        $request['name']=$user['name'];
        $request['id']=$user['id'];
        if(empty($user)){
            return 'token无效';
        }
        // $request
        // var_dump(expression) $user;
    // the token is valid and we have found the user via the sub claim
    // return response()->json(compact('user'));
         return $next($request);
    }
}
