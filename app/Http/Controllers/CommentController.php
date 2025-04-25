<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Rating;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Rating::latest()->paginate(3); // جلب 3 تعليقات فقط

        $complaints = Complaint::latest()->paginate(3); // جلب 3 شكاوى فقط

        return view('dashbordadmin.coment', compact('comments', 'complaints'));

    }
    public function destroy($id)
    {
        $comments = Rating::findOrFail($id);

        // تأكد إنه فعلاً بائع
              $comments->delete();

            return redirect()->back()->with('success', 'تم الحذف  بنجاح.');


        }
        public function destroyg($id)
        {
            $complaints = Complaint ::findOrFail($id);

            // تأكد إنه فعلاً بائع
                   $complaints ->delete();

                return redirect()->back()->with('success', 'تم الحذف  بنجاح.');


            }
}
