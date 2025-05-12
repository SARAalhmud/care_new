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
    public function update(Request $request, $id)
{
    // مؤقتاً فارغة، فقط لتجنب الخطأ
}

public function toggleVisibility($id)
{
    $comment = Rating::findOrFail($id);
    $comment->is_visible = !$comment->is_visible;
    $comment->save();

    return redirect()->back()->with('success', 'تم تحديث حالة التعليق.');
}



        public function destroyg($id)
        {

            }
            public function toggleVisibilitycc($id)
{
    $complaint = Complaint::findOrFail($id);
    $complaint->is_visible = !$complaint->is_visible;
    $complaint->save();

    return redirect()->back()->with('success', 'تم تحديث حالة الشكوى.');
}

}
