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

<div id="page-content-wrapper">
    <!-- Top Navigation -->

    <!-- Top Navigation End -->

    <!-- Page Content -->
    <div class="container-fluid page-content p-4">
        <!-- Page Title -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title">إدارة الإعلانات</h4>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('ads.index')}}">الرئيسية</a></li>
                                <li class="breadcrumb-item active">الإعلانات</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Advertisements Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">قائمة الإعلانات</h5>
                <div class="dropdown">


                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>


                            <tr>
                                <th>#</th>

                                <th>عنوان الإعلان</th>
                                <th>الشركة</th>
                                <th>السعر</th>
                                <th>تاريخ النشر</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $ads as $ads)

                            <tr>

                                <td>{{$ads->id}}</td>

                                <td>{{$ads->full_name}}</td>
                                <td>{{$ads->location}}</td>
                                <td>{{$ads->phone_number}}</td>
                                <td>{{$ads->start_date}}</td>
                                <td>            @if ($ads->approved)
                                    <span class="badge bg-success">نشط</span>
                                @else
                                <span class="badge bg-danger">غير نشط</span>
                                @endif
                    </td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('adv.edit', $ads->id) }}" class="action-btn" data-bs-toggle="tooltip" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('adv.destroy', $ads->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-ad-btn" data-bs-toggle="tooltip" title="حذف">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('adv.approve', $ads->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="action-btn approve-btn" data-bs-toggle="tooltip" title="موافقة">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>



                                    </div>
                                </td>
                            </tr>

                            @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
    <!-- Page Content End -->
</div>

@endsection
