@extends('layouts.navigation')
@section('nav')
<style>
 .carousel-item {
    position: relative;
    height: 100vh; /* يجعل العنصر يغطي كامل الشاشة */
}

.carousel-caption {
    position: absolute;
    top: 50%; /* يحرك العنصر النصي للمنتصف */
    left: 50%; /* يحرك العنصر النصي للمنتصف أفقيًا */
    transform: translate(-50%, -50%); /* لتحريك العنصر لتصحيح الوضع */
    z-index: 2; /* للتأكد من أن النص يظهر فوق الصورة */
}

.carousel-item img {
    object-fit: cover; /* للتأكد من أن الصورة تغطي المساحة كاملة */
    width: 100%;
    height: 100%;
}
.btn-golden {
    background-color: #FFD700;
    color: #000;
    border-radius: 6px;
    padding: 10px 16px;
    font-weight: bold;
    display: block;
    text-align: center;
    transition: 0.3s ease;
}

.btn-golden:hover {
    background-color: #e6c200;
    color: #000;
}
.golden-glow {
    transition: all 0.3s ease-in-out;
    box-shadow: 0 0 0 transparent; /* البداية بدون ظل */
}

.golden-glow:hover {
    box-shadow: 0 0 30px 10px rgba(255, 215, 0, 0.25); /* ظل ذهبي خلف الكرت */
    transform: translateY(-5px); /* يعطي طفو خفيف */
}


</style>
  <!-- Hero Carousel -->
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة فاخرة">
        <div class="carousel-caption">
            <h2>{{ __('messages.hero_title_1') }}</h2>
            <p>{{ __('messages.hero_title_1') }}</p>    </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة سبورت">
        <div class="carousel-caption">
            <h2>{{ __('messages.hero_title_2') }}</h2>
            <p>{{ __('messages.hero_text_2') }}</p>
                 </div>
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1740&auto=format&fit=crop" class="d-block w-100" alt="سيارة عائلية">
        <div class="carousel-caption">
            <h2>{{ __('messages.hero_title_3') }}</h2>
            <p>{{ __('messages.hero_text_3') }}</p>         </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>


  <section class="latest-cars py-5 bg-gradient-to-b from-black to-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">{{ __('messages.latest_cars') }}</h2>
<p class="text-muted">{{ __('messages.latest_cars_desc') }}</p>
    </div>
      <div class="row g-4">
        <!-- Latest Car 1 -->


        <!-- Latest Car 2 -->

        @foreach($newCars as $car)

        <!-- Latest Car 3 -->
        <div class="col-lg-4 col-md-6 position-relative car-image-wrapper">
<div class="card car-card bg-black h-100 golden-glow">



            <div class="position-relative">
                @if(!empty($car->car_images) && is_array($car->car_images) && count($car->car_images) > 0)
                <img src="{{ asset('storage/' . $car->car_images[0]) }}" alt="{{ $car->name }}" class="card-img-top">
            @else
                <img src="/default-car.jpg" alt="صورة غير متوفرة" class="card-img-top">
            @endif
               <div class="car-tag">جديد</div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <h5 class="card-title text-white">{{ $car->brand }}</h5>
                  <span class="golden-text fw-bold">{{ $car->price }}</span>
                </div>
                <div class="car-details text-muted small mb-3 d-flex">
                    <span class="me-2"><i class="bi bi-building"></i> {{ $car->user->name }}</span>
                    <span class="me-2"><i class="bi bi-calendar"></i> {{ $car->year }}</span>
                    <span><i class="bi bi-speedometer2"></i> {{ $car->speed }} كم</span>
                </div>
<a href="{{ route('cars.carshow', $car->id) }}" class="btn-golden">
    {{ __('messages.details') }}
</a>



          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="sold-cars py-5 bg-gradient-to-b from-black to-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">{{ __('messages.sold_cars') }}</h2>
        <p class="text-muted">{{ __('messages.sold_cars_desc') }}</p>
             </div>
      <div class="row g-4">
        @foreach($soldCars as $car)
        <div class="col-lg-4 col-md-6">
          <div class="card car-card bg-black h-100">
            <div class="position-relative">
                @if(!empty($car->car_images) && is_array($car->car_images) && count($car->car_images) > 0)
                <img src="{{ asset('storage/' . $car->car_images[0]) }}" alt="{{ $car->name }}" class="card-img-top">
            @else
                <img src="/default-car.jpg" alt="صورة غير متوفرة" class="card-img-top">
            @endif    <div class="sold-overlay">
                <span class="badge bg-danger sold-badge">{{ __('messages.sold') }}</span>
            </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between mb-2">
                <h5 class="card-title text-white">{{ $car->brand }}</h5>
                <span class="golden-text fw-bold">{{ $car->price }}</span>
              </div>
              <div class="car-details text-muted small mb-3 d-flex">

                  <span class="me-2"><i class="bi bi-calendar"></i> {{ $car->year }}</span>
                  <span><i class="bi bi-speedometer2"></i> {{ $car->speed }} كم</span>
              </div>
              <div class="text-white small mb-3">
                <i class="bi bi-person-circle me-1"></i> {{ __('messages.sold_by') }} {{ $car->user->name }}
            </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>



  <div id="adCarousel" data-bs-ride="carousel" class="carousel slide">
    <div class="carousel-inner" style="height: 210px;">

        <!-- عرض الإعلانات -->
        @foreach($ads as $ad)
            <div class="carousel-item @if($loop->first) active @endif position-relative" style="height: 150px;">
                <img src="{{ asset('storage/' . $ad->image) }}" class="d-block w-100 h-100 object-fit-cover" alt="إعلان" style="object-fit: cover;">

                <!-- المحتوى النصي -->
                <div class="position-absolute top-50 start-50 translate-middle text-center w-100" style="z-index: 2;">
                    <h2 class="text-light fs-6 mb-1">{{ $ad->full_name }}</h2>
                    <p class="text-light fs-6 mb-1">{{ $ad->ad_url }}</p>
                    <a href="{{ $ad->ad_url }}" class="btn btn-warning btn-sm fw-bold">
                        {{ __('messages.discover_more') }}
                    </a>      </div>
            </div>
        @endforeach

        <!-- إعلان افتراضي -->
        <div class="carousel-item @if($ads->isEmpty()) active @endif position-relative" style="height: 200px;">
            <!-- خلفية ذهبية -->
            <div class="w-100 h-100 position-absolute top-0 start-0" style="background-color: #FFD700; z-index: 1;"></div>

            <!-- المحتوى النصي -->
            <div class="position-absolute top-50 start-50 translate-middle text-center w-100" style="z-index: 2;">
                <h2 class="text-dark fs-6 fw-bold mb-2">
                    {{ __('messages.ads_discover') }}
                </h2>          <a href="{{ route('ads.create', ['location' => 'header']) }}" class="btn btn-dark btn-sm fw-bold">
                    {{ __('messages.ads_btn') }}
                </a>
            </div>
        </div>
    </div>

    <!-- أزرار التحكم -->
    <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#adCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>


  <!-- Various Cars -->
  <section class="various-cars py-5 bg-gradient-to-b from-black to-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">{{ __('messages.various_cars') }}</h2>
        <p class="text-muted">{{ __('messages.various_cars_desc') }}</p>
           </div>
      <div class="row g-4">
        <!-- Car 1 -->

        @foreach ($displayedCars as $car)
        <!-- Car 2 -->
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
                <div class="car-details text-muted small mb-3 d-flex">

                    <span class="me-2"><i class="bi bi-calendar"></i> {{ $car->year }}</span>
                    <span><i class="bi bi-speedometer2"></i> {{ $car->speed }} كم</span>
                </div>

              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>





  <!-- Testimonials -->
  <section class="testimonials py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="text-white">{{ __('messages.testimonials_title') }}</h2>
        <p class="text-muted">{{ __('messages.testimonials_desc') }}</p>    </div>
      <div class="row g-4">
        @foreach($ratings as $rating)
          @if($rating->rating >= 4)
            <div class="col-md-4">
              <div class="card testimonial-card bg-black h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div class="testimonial-avatar golden-bg">
                      {{ mb_substr($rating->user->name, 0, 1) }}
                    </div>
                    <div class="ms-3">
                      <h5 class="text-white mb-1">{{ $rating->user->name }}</h5>
                      <div class="golden-stars">
                        @for($i = 1; $i <= 5; $i++)
                          @if($i <= $rating->rating)
                            <i class="bi bi-star-fill text-warning"></i>
                          @else
                            <i class="bi bi-star text-secondary"></i>
                          @endif
                        @endfor
                      </div>
                    </div>
                  </div>
                  <p class="text-light">{{ $rating->comment }}</p>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

@endsection
