@extends('layouts.navigation')

@section('nav')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<style>

    body {
        background-color: #1e1e1e;
        font-family: 'Cairo', sans-serif;
        color: #ffffff;
    }

    .text-golden {
        color: #d4af37;
    }

    .border-golden {
        border: 2px solid #d4af37 !important;
    }

    .btn {
        background-color: #2c2c2c;
        color: #d4af37;
        padding: 8px 16px;
        border: 1px solid #d4af37;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-weight: 500;
    }

    .btn:hover {
        background-color: #d4af37;
        color: #1e1e1e;
    }

    .card {
        background-color: #2f2f2f;
        border-radius: 16px;
    }

    .card-img-top {
        height: 240px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .list-group-item {
        background-color: transparent;
        border: none;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 1.1rem;
        color: #ffffff;
    }

    .list-group-item strong {
        color: #d4af37;
        margin-left: 5px;
    }

    .badge {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }

    .btn-outline-golden {
        color: #d4af37;
        border: 1px solid #d4af37;
        background-color: transparent;
    }

    .btn-outline-golden:hover {
        background-color: #d4af37;
        color: #1e1e1e;
    }

    h2 {
        color: #ffffff;
    }

    p.text-muted {
        color: #bbbbbb !important;
    }
</style>

<div class="container py-5">

    {{-- عنوان السيارة --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5 text-golden">{{ $car->brand }} {{ $car->model }} <span class="text-muted">({{ $car->year }})</span></h2>
        <p class="text-muted">  {{ __('messages.car_details_view') }}</p>
    </div>

    {{-- صور السيارة --}}
    @if(!empty($car->car_images) && is_array($car->car_images))
        <div class="row mb-5">
            @foreach($car->car_images as $image)
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0">
                        <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="صورة السيارة">
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- معلومات السيارة --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-golden">
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>{{ __('messages.car_price') }}:</strong> <span class="text-golden">{{ number_format($car->price) }} ريال</span></li>
                        <li class="list-group-item"><strong>{{ __('messages.car_color') }}:</strong> {{ $car->color ?? 'غير محدد' }}</li>
                        <li class="list-group-item"><strong>{{ __('messages.car_country') }}:</strong> {{ $car->country ?? 'غير محددة' }}</li>
                        <li class="list-group-item"><strong>{{ __('messages.car_city') }}:</strong> {{ $car->city ?? 'غير محددة' }}</li>
                        <li class="list-group-item"><strong>{{ __('messages.car_speed') }}:</strong> {{ $car->speed ?? 'غير محددة' }} كم/س</li>
                        <li class="list-group-item"><strong>{{ __('messages.car_fuel') }} :</strong> {{ $car->fuel_type ?? 'غير معروف' }}</li>
                        <li class="list-group-item"><strong>{{ __('messages.car_description') }}:</strong> {{ $car->description ?? 'لا يوجد وصف' }}</li>
                        <li class="list-group-item">   <strong>{{ __('messages.car_owner_phone') }}  :</strong> {{ $car->user->mobileno ?? 'غير متوفر' }}</li>
                        <li class="list-group-item">
                            <strong>{{ __('messages.car_status') }}:</strong>
                            {!! $car->sold
                                ? '<span class="badge bg-danger rounded-pill">' . __('messages.car_sold') . '</span>'
                                : '<span class="badge bg-success rounded-pill">' . __('messages.car_available') . '</span>'
                            !!}
                        </li>
                    </ul>
                    @if(auth()->check() && auth()->id() === $car->user_id)
                    <form action="{{ route('dashboard.destroy', $car->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-golden">{{ __('messages.btn_delete') }}</button>
                    </form>
                  @endif

                  @auth
    @if(auth()->id() === $car->user_id)
        <a href="{{ route('dashboard.edit', $car->id) }}" class="btn btn-primary">
            {{ __('messages.btn_edit') }}
        </a>
    @endif
@endauth
                </div>
                </div>
            </div>

            {{-- زر الرجوع --}}
            <div class="text-center mt-4">
                <a href="{{ route('cars.byModel', $car->model) }}" class="btn btn-outline-golden">{{ __('messages.btn_back_to_models') }}  </a>
            </div>
        </div>
    </div>
</div>
  {{-- إضافة الشكوى --}}
  <div class="mt-5">
    <h5 class="text-white">{{ __('messages.complaint_add_title') }} </h5>
    {{-- إذا كانت السيارة تسمح بإظهار الشكوى --}}
    @if(Auth::check())

        <form action="{{ route('complaints.store') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            {{-- اسم العميل --}}
            <div class="form-group mb-3">
                <label for="customer_name" class="text-white">{{ __('messages.complaint_customer_name') }} </label>
                <input type="text" name="customer_name" class="form-control" placeholder="أدخل اسمك" required>
            </div>

            {{-- الهاتف أو البريد الإلكتروني --}}
            <div class="form-group mb-3">
                <label for="phone_email" class="text-white"> {{ __('messages.complaint_phone_email') }}  </label>
                <input type="text" name="phone_email" class="form-control" placeholder="أدخل رقم الهاتف أو البريد الإلكتروني" required>
            </div>

            {{-- نوع الشكوى --}}
            <div class="form-group mb-3">
                <label for="type" class="text-white">{{ __('messages.complaint_type') }} </label>
                <select name="type" class="form-control" required>
                    <option value="مشكلة تقنية">{{ __('messages.complaint_type_tech') }} </option>
                    <option value="خدمة العملاء">{{ __('messages.complaint_type_service') }} </option>
                    <option value="سوء المعاملة">{{ __('messages.complaint_type_behavior') }} </option>
                    <option value="أخرى">{{ __('messages.complaint_type_other') }}</option>
                </select>
            </div>

            {{-- محتوى الشكوى --}}
            <div class="form-group mb-3">
                <label for="content" class="text-white">{{ __('messages.complaint_content') }} </label>
                <textarea name="content" class="form-control" rows="4" placeholder="اكتب شكواك هنا..." required></textarea>
            </div>

            <button type="submit" class="btn btn-submit-complaint">{{ __('messages.complaint_submit') }} </button>
        </form>
        @else
    <div class="alert alert-warning">
        يجب عليك تسجيل الدخول أولاً لإرسال الشكوى.
    </div>
@endif
@if($car->complaints->count())
    @foreach($car->complaints as $complaint)
        @php
            $userIsOwner = Auth::check() && Auth::user()->id === $car->user_id;
            $userIsComplainer = Auth::check() && Auth::user()->id === $complaint->user_id;
        @endphp

        @if($car->show_complaints || $userIsOwner || $userIsComplainer)
            <div class="alert alert-warning mt-4">
                <strong>{{ __('messages.complaint_show_label') }} :</strong> {{ $complaint->content }}
            </div>
        @endif
    @endforeach
@endif

</div>
</div>
</div>
    </div>
@endsection
