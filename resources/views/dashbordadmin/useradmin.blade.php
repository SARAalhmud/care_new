@extends('layouts.admin')
@section('admin')

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
    <!-- عنوان الصفحة -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title">شركات السيارات</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('ads.index') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">شركات السيارات</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- جدول الشركات -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">قائمة الشركات</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الشركة</th>
                            <th>رقم الجوال</th>
                            <th>emial</th>

                            <th>تاريخ الإضافة</th>

                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usera as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mobileno }}</td>
                            <td>{{ $user->email }}</td>
                                  <td>{{ $user->created_at }}</td>

                            <td>

                                <form action="{{ route('usera.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn text-danger" data-bs-toggle="tooltip" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذه الشركة؟')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $usera->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
</div>


@endsection
