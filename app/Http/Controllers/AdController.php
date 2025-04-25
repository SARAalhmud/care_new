<?php
namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Car;
use App\Models\Complaint;
use App\Models\Rating;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



    class AdController extends Controller
    {
        public function index()
        {
            $request = app(Request::class); // من خلال الـ Service Container

            $filter = $request->get('filter');

            // تابع باقي الكود كما هو
            if ($filter) {
                switch ($filter) {
                    case 'ads':
                        $ade = AD::latest()->take(3)->get();
                        $usesat = collect(); // إفراغ البيانات الأخرى
                        $Complaint = collect();
                        $rat = collect();
                        break;
                    case 'comments':
                        $ade = collect();
                        $usesat = collect();
                        $Complaint = Complaint::latest()->take(3)->get();
                        $rat = collect();
                        break;
                    case 'companies':
                        $ade = collect();
                        $usesat = User::where('role', 'seller')->latest()->take(3)->get();
                        $Complaint = collect();
                        $rat = collect();
                        break;
                    case 'ratings':
                        $ade = collect();
                        $usesat = collect();
                        $Complaint = collect();
                        $rat = Rating::latest()->take(3)->get();
                        break;
                    default:
                        // إذا لم يتم اختيار فلتر معين، يتم جلب كل البيانات
                        $ade = AD::latest()->take(3)->get();
                        $usesat = User::where('role', 'seller')->latest()->take(3)->get();
                        $Complaint = Complaint::latest()->take(3)->get();
                        $rat = Rating::latest()->take(3)->get();
                        break;
                }
            } else {
                // إذا لم يكن هناك فلتر، يتم جلب كل البيانات
                $ade = AD::latest()->take(3)->get();
                $usesat = User::where('role', 'seller')->latest()->take(3)->get();
                $Complaint = Complaint::latest()->take(3)->get();
                $rat = Rating::latest()->take(3)->get();
            }

            // بيانات إضافية
            $ads = Ad::where('approved', false)->get();
            $sellerCount = User::where('role', 'seller')->count();
            $aderCount = ad::count();
            $ComplainterCount = Complaint::count();
            $RatingerCount = Rating::count();

            // الحصول على عدد السيارات المباعة
            $soldCarsCount = Car::where('sold', true)->count();

            // الحصول على عدد السيارات غير المباعة
            $unsoldCarsCount = Car::where('sold', false)->count();

            // حساب النسبة المئوية للزيادة
            $topCompanies = User::where('role', 'seller')
                ->withCount(['cars as sold_cars_count' => function ($query) {
                    $query->where('sold', true);
                }])
                ->orderByDesc('sold_cars_count')
                ->take(5) // أعلى 5 شركات
                ->get();

            return view('dashbordadmin.admin', compact(
                'unsoldCarsCount',
                'soldCarsCount',
                'RatingerCount',
                'ComplainterCount',
                'aderCount',
                'sellerCount',
                'ads',
                'topCompanies',
                'rat',
                'Complaint',
                'usesat',
                'ade' // البيانات التي سيتم عرضها حسب الفلتر
            ));
        }




    public function create(Request $request)
    {
        $location = $request->location;
        return view('ad', compact('location'));
    }

    // حفظ الإعلان الجديد
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'ad_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|in:header,sidebar,footer',
       'phone_number' => 'nullable|string|max:15',
        ]);

        // حفظ الصورة
        $imagePath = $request->file('image')->store('ads', 'public');

        Ad::create([

            'full_name' => $request->full_name,
            'image' => $imagePath,
            'ad_url' => $request->ad_url,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
         'phone_number' => $request->phone_number,
            'approved' => false, // مبدئياً غير موافق عليه
        ]);

        return redirect()->back()->with('success', 'تم إرسال إعلانك للمراجعة.');
    }

    // موافقة المشرف على الإعلان

    }
