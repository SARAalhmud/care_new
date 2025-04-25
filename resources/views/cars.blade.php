<!-- resources/views/cars/show.blade.php -->
@extends('layouts.navigation')

@section('nav')
<div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white">  سيارات الموديل:  <span class="golden-text">{{ $model }}</span></h1>
          <p class="text-muted">اكتشف مجموعتنا الواسعة من السيارات الفاخرة والرياضية والعائلية</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="/" class="text-white">الرئيسية</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">السيارات</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="row g-4">
    @foreach($cars as $car)
    <div class="col-lg-4 col-md-6">
      <div class="card car-card bg-black h-100">
        <div class="position-relative">
            @if(!empty($car->car_images) && is_array($car->car_images) && count($car->car_images) > 0)
            <img src="{{ asset('storage/' . $car->car_images[0]) }}" alt="{{ $car->name }}" class="card-img-top">
        @else
            <img src="/default-car.jpg" alt="صورة غير متوفرة" class="card-img-top">
        @endif

                </div>
        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <h5 class="card-title text-white">{{ $car->brand }}</h5>
            <span class="golden-text fw-bold">{{ $car->price }}</span>
          </div>
          <div class="car-details text-muted small mb-3">
            <span class="me-3"><i class="bi bi-calendar me-1"></i> {{ $car->year }}</span>
            <span class="me-3"><i class="bi bi-speedometer2 me-1"></i>{{ $car->speed }}كم</span>
            <span><i class="bi bi-fuel-pump me-1"></i> {{ $car->fuel_type }}</span>
          </div>
          @if($car->sold)
    <span class="badge bg-danger position-absolute top-0 end-0 m-2">مباعة</span>
@endif
<a href="{{ route('cars.carshow', $car->id) }}" class="btn btn-outline-golden w-100">تفاصيل</a>
</div>
      </div>
    </div>

        @endforeach
    </div>
@endsection
