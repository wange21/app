<?php

namespace App\Http\Middleware;

use Closure;

class manageMiddleware
{
    /**
     * 后台管理中间件
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //如果没有进行过登陆，跳转到登陆界面
        if (empty(session('user')))
            return redirect('manage/login');
        else
            return $next($request);
    }
}
