@extends('layouts.navigation')
@section('nav')
@if (session('success'))
    <div class="alert alert-success" style="background-color: white; border: 1px solid #28a745; color: #28a745;">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4 bg-dark text-white">
                    <div class="card-header text-center">
                        <h3>إضافة إعلان جديد</h3>
                    </div>
                    <div class="card-body">
                        <!-- اسم الإعلان -->
                        <div class="form-group mb-3">
                            <label for="full_name">اسم الإعلان</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="أدخل اسم الإعلان" value="{{ old('full_name') }}" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- صورة الإعلان -->
                        <div class="form-group mb-3">
                            <label for="image">صورة الإعلان</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- رابط الإعلان -->
                        <div class="form-group mb-3">
                            <label for="ad_url">رابط الإعلان (اختياري)</label>
                            <input type="url" class="form-control" id="ad_url" name="ad_url" placeholder="أدخل رابط الإعلان" value="{{ old('ad_url') }}">
                            @error('ad_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $phone_number }}</div>
                            @enderror
                        </div>

                        <!-- تاريخ البداية -->
                        <div class="form-group mb-3">
                            <label for="start_date">تاريخ البدء</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- تاريخ النهاية -->
                        <div class="form-group mb-3">
                            <label for="end_date">تاريخ الانتهاء</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- الموقع -->
                        <div class="form-group mb-3">
                            <label for="location">الموقع</label>
                            <select class="form-control" id="location" name="location" required>
                                <option value="header" {{ old('location') == 'header' ? 'selected' : '' }}>رأس الصفحة</option>
                                <option value="sidebar" {{ old('location') == 'sidebar' ? 'selected' : '' }}>الشريط الجانبي</option>
                                <option value="footer" {{ old('location') == 'footer' ? 'selected' : '' }}>أسفل الصفحة</option>
                            </select>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- زر إرسال الإعلان -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-warning btn-lg mt-3 fw-bold">أضف إعلانك الآن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
