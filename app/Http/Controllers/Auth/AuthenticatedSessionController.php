<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * التعامل مع طلب المصادقة.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // محاولة التحقق من صحة البيانات المدخلة
        $request->authenticate();

        // تجديد الجلسة بعد المصادقة
        $request->session()->regenerate();

        // التوجيه بناءً على دور المستخدم
        $user = Auth::user();

        if ($user->role === 'admin') {
            // إعادة توجيه المسؤول إلى لوحة التحكم
            return redirect()->route('ads.index');
        }

        // إعادة توجيه المستخدم العادي إلى الصفحة الرئيسية
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * تدمير الجلسة المصادق عليها.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // إبطال الجلسة
        $request->session()->invalidate();

        // تجديد التوكن
        $request->session()->regenerateToken();

        // إعادة التوجيه إلى الصفحة الرئيسية بعد تسجيل الخروج
        return redirect('/');
    }
}
