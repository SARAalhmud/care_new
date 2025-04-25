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
<div class="container-fluid page-content p-4">
    <!-- Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title">تعديل بيانات شركة</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="companies.html">شركات السيارات</a></li>
                            <li class="breadcrumb-item active">تعديل بيانات شركة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Company Form -->
    <div class="card">
        <div class="card-header bg-gold-light">
            <h5 class="card-title mb-0">تعديل بيانات شركة {{ $company->name }}</h5>
        </div>
        <div class="card-body">
            <form id="edit-company-form" method="POST" action="{{ route('Company.update', $company->id) }}">
                @csrf
                @method('PUT')

                <!-- Basic Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="form-section-title">المعلومات الأساسية</h6>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name-en" class="form-label">اسم الشركة بالإنجليزية</label>
                        <input type="text" class="form-control" id="name-en" name="name" value="{{ $company->name }}" required>
                    </div>

                </div>

                <!-- Contact Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="form-section-title">معلومات الاتصال</h6>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="tel" class="form-control" id="mobileno" name="phone" value="{{ $company->mobileno }}">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="text-end">
                    <a href="{{ route('Company.index') }}" class="btn btn-secondary me-2">إلغاء</a>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
