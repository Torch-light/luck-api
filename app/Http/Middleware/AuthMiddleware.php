<?php  

namespace App\Http\Middleware;
use Closure;
use JWTAuth;
/**
* auth test
*/
class AuthMiddleware
{
	 public function handle($request, Closure $next)
    {
        $response = $next($request);
        // Perform action
        return $request;
    }
}