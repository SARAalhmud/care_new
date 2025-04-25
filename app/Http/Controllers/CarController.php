<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function create()
    {
        $user = Auth::user();

        // جلب السيارات الخاصة بالمستخدم الحالي
        $cars = $user->cars;
        return view('slarecar',compact('cars'));
    }

    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة باستخدام القواعد المحددة في موديل Car
        $validatedData = $request->validate(Car::rules());

        // إضافة user_id للمستخدم الحالي يدويًا
        $validatedData['user_id'] = auth()->id();

        // مصفوفة لتخزين مسارات الصور
        $imagePaths = [];

        // التحقق من وجود ملفات الصور وتخزينها
        if ($request->hasFile('car_images')) {
            foreach ($request->file('car_images') as $image) {
                // تخزين الصور في مجلد "car_images" داخل التخزين العام
                $path = $image->store('car_images', 'public');
                $imagePaths[] = $path;
            }
        }

        // إضافة مسارات الصور إلى بيانات السيارة
        $validatedData['car_images'] = $imagePaths;

        try {
            // إنشاء السيارة يدويًا باستخدام بيانات المستخدم الحالي
            $car = new Car($validatedData);
            $car->save();

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('dashboard.create')->with('success', 'تم إضافة السيارة بنجاح!');
        } catch (\Exception $e) {
            // إذا حدث خطأ أثناء عملية الإضافة، إرجاع المستخدم مع رسالة خطأ مفصلة
            // عرض التفاصيل في الجلسة لتوضيح السبب
            return redirect()->route('dashboard.index')->with('error', 'حدث خطأ أثناء إضافة السيارة! تفصيل الخطأ: ' . $e->getMessage());
        }


    }


    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $model = $car->model; // نجيب الموديل قبل نحذف
        $car->delete();

        return redirect()->route('cars.byModel', ['model' => $model])->with('success', 'تم الحذف بنجاح');
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        // تأكد إن المستخدم هو صاحب السيارة
        if (auth()->id() !== $car->user_id) {
            abort(403, 'غير مصرح لك بالتعديل');
        }

        return view('edit', compact('car'));
    }
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        // تحقق من صحة البيانات
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year'  => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'sold' => 'boolean',
            'show_complaints' => 'boolean',
            'car_images' => 'nullable|array|max:3', // السماح بتحميل الصور (حتى 3 صور)
            'car_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // قيود الصور
            'speed' => 'nullable|integer|min:0',
            'fuel_type' => 'nullable|string',
        ]);

        // تحديث البيانات الأخرى
        $car->update([
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'] ?? null,
            'color' => $validatedData['color'] ?? null,
            'country' => $validatedData['country'] ?? null,
            'city' => $validatedData['city'] ?? null,
            'sold' => $validatedData['sold'] ?? false,
            'show_complaints' => $validatedData['show_complaints'] ?? false,
            'speed' => $validatedData['speed'] ?? null,
            'fuel_type' => $validatedData['fuel_type'] ?? null,
        ]);

      // في دالة التحديث
if ($request->hasFile('car_images')) {
    // تخزين روابط الصور في الحقل car_images
    $imagePaths = [];

    foreach ($request->file('car_images') as $image) {
        // حفظ الصورة في الدليل المناسب
        $path = $image->store('car_images', 'public');
        $imagePaths[] = $path; // إضافة المسار إلى مصفوفة
    }

    // تخزين المسارات في الحقل car_images مباشرة كـ مصفوفة
    $car->car_images = $imagePaths;
    $car->save();
}


        // إعادة التوجيه إلى صفحة عرض السيارة مع رسالة نجاح
        return redirect()->route('cars.byModel', ['model' => $car->model])
                         ->with('success', 'تم تعديل بيانات السيارة بنجاح');
    }




}
