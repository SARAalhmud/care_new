<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\Complaint;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller

{public function index()
    {
        $ratings = Rating::where('rating', '>=', 4)->latest()->take(6)->get(); // خذ فقط آخر 6 تقييمات مثلاً
        $soldCars = Car::where('sold', 1)->get();
        $ads = Ad::where('approved', 1)->get();
        $weekNumber = Carbon::now()->weekOfYear;

        $cars = Car::all(); // أو تقدر تستخدم شروط معينة لو تبغى
        $count = $cars->count();

        if ($count < 3) {
            // عرض الموجود فقط إذا أقل من 3
            $displayedCars = $cars;
        } else {
            $groupSize = 3;

            // نحسب كم دورة مرت من تاريخ معين
            $startDate = Carbon::create(2024, 1, 1); // حط تاريخ بداية ثابت
            $daysPassed = Carbon::now()->diffInDays($startDate);
            $cycle = floor($daysPassed / 3);

            // نحدد من وين نبدأ نعرض
            $startIndex = ($cycle * $groupSize) % $count;

            // ناخذ 3 سيارات بشكل دائري
            $displayedCars = collect();
            for ($i = 0; $i < $groupSize; $i++) {
                $displayedCars->push($cars[($startIndex + $i) % $count]);
            }
        }
        $newCars = Car::latest()->take(3)->get();
        return view('welcome', compact('displayedCars','soldCars','newCars','ads' , 'ratings'));
    }


    public function show($model)
{
    // البحث عن السيارات التي لها نفس الموديل
    $cars = Car::where('model', $model)->get();

    // عرض السيارات
    return view('cars', compact('cars', 'model'));
}
public function carshow($id){
    $car=Car::findOrFail($id);
    return view('shiw',compact('car'));
}

public function store(Request $request)
{
    if (!Auth::check()) {
        // إذا لم يكن المستخدم مسجلًا، قم بإعادة التوجيه إلى صفحة تسجيل الدخول مع رسالة
        return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول قبل إرسال الشكوى.');
    }

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone_email' => 'required|string|max:255',
        'type' => 'required|string',
        'content' => 'required|string',
        'car_id' => 'required|exists:cars,id',
    ]);

    // العثور على السيارة
    $car = Car::findOrFail($request->car_id);

    // إنشاء الشكوى
    $complaint = new Complaint();
    $complaint->customer_name = $request->customer_name;
    $complaint->phone_email = $request->phone_email;
    $complaint->content = $request->content;
    $complaint->type = $request->type;
    $complaint->user_id = Auth::id(); // المستخدم الذي أرسل الشكوى
    $complaint->car_id = $request->car_id;
    $complaint->approvd = false; // يمكنك تعديل هذا إذا كنت تحتاج إلى الموافقة التلقائية أو لا
    $complaint->save();

    // إعادة التوجيه مع رسالة النجاح
    return redirect()->back()->with('success', 'تم إرسال الشكوى بنجاح');
}



}
