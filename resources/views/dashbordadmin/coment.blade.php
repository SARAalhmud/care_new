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
                        <h4 class="page-title">إدارة التعليقات</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('ads.index')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">التعليقات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">قائمة التقيمات</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المستخدم</th>
                            <th>نص التعليق</th>
                            <th>التقيم</th>
                            <th>تاريخ الإضافة</th>

                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($comments as $comment)



                            <td>{{$comment->id}}</td>
                            <td>{{$comment->user->name}}</td>

                            <td>
                                <span class="comment-text">{{$comment->comment}}</span>
                            </td>
                            <td>{{$comment->rating}}</td>
                            <td>{{$comment->created_at}}</td>
                                 <td>
                                <div class="actions">
                                    <form action="{{ route('coment.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn text-danger" data-bs-toggle="tooltip" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذه التقيم')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

    </div>
</div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">قائمة الشكاوي</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المستخدم</th>
                            <th>نص التعليق</th>
                            <th>اسم السيارة</th>
                            <th>تاريخ الإضافة</th>
                            <th>النوع</th>

                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($complaints as $complaint)



                        <td>{{$complaint->id}}</td>
                        <td>{{$complaint->customer_name}} </td>
                        <td>
                            <span class="comment-text">{{$complaint->content}}</span>
                        </td>
                        <td>{{$complaint->car->model}}</td>
                        <td>{{$complaint->created_at}}</td>

                        <td>{{ $complaint->type }}</td>
                        <td>
                            <div class="actions">
                                <form action="{{ route('destroy', $complaint->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn text-danger" data-bs-toggle="tooltip" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذه الشكوى؟')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">



                {{ $complaints->links('vendor.pagination.bootstrap-4') }}


        </div>
    </div>
</div>
<!-- Page Content End -->
</div>
<!-- Page Content Wrapper End -->
</div>
@endsection
