<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
$request=request();
$query=Car::query();
$brand = $request->query("brand");
if ($request->has('brand') && $request->brand) {
    $query->where('brand', 'LIKE', '%' . $request->brand . '%');
}

// فلتر الموديل
if ($request->has('model') && $request->model) {
    $query->where('model', 'LIKE', '%' . $request->model . '%');
}

// فلتر السنة
if ($request->has('year') && $request->year) {
    $query->where('year', $request->year);
}

// فلتر السعر
if ($request->has('price') && $request->price) {
    $query->where('price', $request->price);
}
$cars=$query->paginate(10);
        return view('carsall', ['cars'=>$cars]);


    }
}
