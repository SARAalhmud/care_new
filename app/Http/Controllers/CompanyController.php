<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
        {
            $Company = User::where('role', 'seller')
            ->withCount([
                'cars', // كل السيارات
                'cars as sold_cars_count' => function ($query) {
                    $query->where('sold', true); // فقط المباعة
                }
            ])
          ->paginate(3);

return view('dashbordadmin.company',compact('Company'));

        }



        public function destroy($id)
        {
            $company = User::findOrFail($id);

            // تأكد إنه فعلاً بائع
            if ($company->role === 'seller') {
                $company->delete();

                return redirect()->back()->with('success', 'تم حذف الشركة بنجاح.');
            }

            return redirect()->back()->with('error', 'هذا المستخدم ليس بائع.');
        }


            // عرض نموذج التعديل
            public function edit($id)
            {
                $company = User::where('role', 'seller')->findOrFail($id);
                return view('dashbordadmin.edite', compact('company'));
            }

            // حفظ التعديلات
            public function update(Request $request, $id)
            {
                // جلب بيانات الشركة من قاعدة البيانات
                $company = User::findOrFail($id);

                // تحديث البيانات

                $company->name= $request->input('name');
     $company->email = $request->input('email');
                $company->mobileno = $request->input('mobileno');

                // حفظ التغييرات
                $company->save();

                // إعادة التوجيه إلى صفحة الشركات مع رسالة نجاح
                return redirect()->route('Company.index')->with('success', 'تم تعديل بيانات الشركة بنجاح');
            }

        }


