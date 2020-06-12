<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
Use App\Models\Shops;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $shop=Shops::where('email',$user->email)->get()->first();
        if($user->type=="admin")
        {
           return $next($request);
        }
        else if($user->type="shop")
        {
            if($shop)
            {
                $id=(($shop->id)*382724-227)*9873;
                 return redirect("/admin/shop/manage/$id");
            }
            else{
                return redirect('/');
            }
        }
    }
        
}
