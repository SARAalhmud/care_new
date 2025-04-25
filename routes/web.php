<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\AdvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth', 'role:seller'])->group(function () {
    // مسارات للبائع فقط
    Route::resource('/dashboard', CarController::class); // على سبيل المثال، مسار للبائع
    // يمكنك إضافة المزيد من المسارات للبائع هنا
});


Route::get('/carsall', [Controller::class, 'index'])->name('carsall');
   Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/cars/{id}',[HomeController::class,'carshow'])->name('cars.carshow');
    // ثم قم بتعريف باقي المسارات باستخدام Route::resource
    Route::get('/cars/model/{model}', [HomeController::class, 'show'])->name('cars.byModel');
    Route::post('/complaints', [HomeController::class, 'store'])->name('complaints.store');
    Route::get('/about',function(){
        return view('about');

    })->name('about');
    Route::get('contact',function()
    {
        return view('contact');
    }
    )->name('contact');






    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('ads', AdController::class)->only(['index']);
        Route::resource('/Company', CompanyController::class);
        Route::post('/adv/{adv}/approve', [AdvController::class, 'approve'])->name('adv.approve');
        Route::resource('/adv', AdvController::class);
        Route::delete('/coment/{id}', [CommentController::class, 'destroyg'])->name('destroy');
        Route::resource('/coment', CommentController::class);
        Route::resource('/usera', AdminUserController::class);
    });




// تغير اللغة
// مسار لتغيير اللغة

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');


    Route::middleware('auth')->group(function () {
        Route::resource('profile', ProfileController::class);
    });
        Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/store', [AdController::class, 'store'])->name('store');
Route::post('/complaints', [HomeController::class, 'store'])->name('complaints.store');





require __DIR__.'/auth.php';
