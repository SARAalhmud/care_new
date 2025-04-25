@extends('layouts.admin')
@section('admin')
    <!-- Main Container -->
    @if (session('success'))
    <div class="alert alert-success" style="background-color: white; border: 1px solid #28a745; color: #28a745;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" style="background-color: white; border: 1px solid #dc3545; color: #dc3545;">
        {{ session('error') }}
    </div>
@endif
<div class="card">
    <div class="card-header bg-gold-light">
        <h5 class="card-title mb-0">تعديل بيانات الإعلان</h5>
    </div>
    <div class="card-body">
       <!-- resources/views/dashbordadmin/edit_advertisement.blade.php -->

<form action="{{ route('adv.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- الاسم الكامل -->
    <div class="form-group">
        <label for="full_name">اسم الإعلان</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $ad->full_name) }}" >
    </div>

    <!-- Hit -->


    <!-- رابط الإعلان -->
    <div class="form-group">
        <label for="ad_url">رابط الإعلان</label>
        <input type="url" class="form-control" id="ad_url" name="ad_url" value="{{ old('ad_url', $ad->ad_url) }}" >
    </div>

    <!-- الصورة -->
    <div class="form-group">
        <label for="image">الصورة</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <!-- الموقع -->
    <div class="form-group">
        <label for="location">الموقع</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $ad->location) }}" >
    </div>

    <!-- تاريخ البداية -->
    <div class="form-group">
        <label for="start_date">تاريخ البداية</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $ad->start_date) }}" >
    </div>

    <!-- تاريخ الانتهاء -->
    <div class="form-group">
        <label for="end_date">تاريخ الانتهاء</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $ad->end_date) }}" required>
    </div>

    <!-- حالة الموافقة -->


    <!-- رقم الهاتف -->
    <div class="form-group">
        <label for="phone_number">رقم الهاتف</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $ad->phone_number) }}" required>
    </div>

    <!-- أزرار الحفظ والإلغاء -->
    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
    <a href="{{ route('ads.index') }}" class="btn btn-secondary">إلغاء</a>
</form>

@endsection
