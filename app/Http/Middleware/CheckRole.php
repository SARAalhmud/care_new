<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {


        $userRole = auth()->user()->role;

        // السماح للأدمن فقط للوصول إلى الصفحات الخاصة بالأدمن
        if ($role === 'admin' && $userRole !== 'admin') {
            return redirect('/')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة');
        }

        // السماح للبائع فقط للوصول إلى الصفحات الخاصة بالبائع
        if ($role === 'seller' && $userRole !== 'seller') {
            return redirect('/')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة');
        }

        // السماح للمستخدم العادي فقط للوصول إلى الصفحات الخاصة به
        if ($role === 'user' && $userRole !== 'user') {
            return redirect('/')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة');
        }

        return $next($request);
    }

}
