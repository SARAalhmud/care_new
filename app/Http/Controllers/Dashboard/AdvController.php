<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvController extends Controller
{
    // عرض جميع الإعلانات في لوحة التحكم
    public function index()
    {
        // جلب كل الإعلانات (بغض النظر عن الموافقة)
        $ads = Ad::paginate(10); // أو يمكنك استخدام any() إذا كنت تريد إحضار كل الإعلانات بدون تقسيم

        return view('dashbordadmin.adver', compact('ads'));
    }

    public function approve($id)
    {
        // العثور على الإعلان باستخدام الـ id
        $ad = Ad::findOrFail($id);

        // تغيير حالة الموافقة (إذا كانت غير موافقة، تصبح موافقة)
        $ad->approved = !$ad->approved; // عكس الحالة
        $ad->save(); // حفظ التغيير في قاعدة البيانات

        // إعادة التوجيه إلى نفس الصفحة مع رسالة النجاح
        return redirect()->route('adv.index')->with('success', 'تم تحديث الحالة بنجاح');
    }
    public function destroy($id)
    {
        $company = Ad::findOrFail($id);

        // تأكد إنه فعلاً بائع
              $company->delete();

            return redirect()->back()->with('success', 'تم الحذف  بنجاح.');


        }

// في AdController
public function edit($id)
{
    // العثور على الإعلان باستخدام المعرف
    $ad = Ad::findOrFail($id);

    // عرض النموذج مع البيانات الحالية
    return view('dashbordadmin.edeitad', compact('ad'));
}

// في AdController
public function update(Request $request, $id)
{
    // التحقق من صحة البيانات المدخلة (التأكد من أن جميع الحقول المطلوبة موجودة وصحيحة)
    $request->validate([
        'full_name' => 'nullable|string|max:255',

        'ad_url' => 'nullable|url',
        'image' => 'nullable|image',
        'location' => 'nullable|string|max:255',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
              'phone_number' => 'nullable|string|max:15',
    ]);

    // العثور على الإعلان بناءً على المعرف
    $ad = Ad::findOrFail($id);

    // تحديث البيانات
    $ad->update([
        'full_name' => $request->input('full_name'),
           'ad_url' => $request->input('ad_url'),
        'image' => $request->file('image') ? $request->file('image')->store('ads') : $ad->image,
        'location' => $request->input('location'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
            'phone_number' => $request->input('phone_number'),
    ]);

    // إعادة التوجيه إلى صفحة الإعلانات مع رسالة نجاح
    return redirect()->route('ads.index')->with('success', 'تم تعديل الإعلان بنجاح');
}


}
