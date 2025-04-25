<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{public function index()
    {
        $usera = User::where('role', 'user')->paginate(3);
        return view('dashbordadmin.useradmin', compact('usera'));
    }

    public function destroy($id)
    {
        $usera = User::findOrFail($id);



            return redirect()->back()->with('success', 'تم حذف  بنجاح.');
        }


}
