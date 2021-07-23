<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerMiddleware
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
        $item = $request->route('item');

        if($item==null){
            return response()->json(['message'=>'The item cannot be found'], 404);
        }

        if($item->user_id != auth()->user()->id){
            return response()->json(['message'=>'You are not the owner of this item.'], 401); 
        }
        return $next($request);
    }
}
