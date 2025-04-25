<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // المستخدم الحالي
        $ratings = $user->ratings; // التقييمات الخاصة به (العلاقة لازم تكون مجهزة في المودل)

        return view('profil', compact('user', 'ratings'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id',
        ]);

        Rating::create([
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'تم إضافة التقييم بنجاح!');
    }

}
