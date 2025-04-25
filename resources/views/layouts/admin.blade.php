<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم شركات السيارات</title>

    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 text-gold fs-4 fw-bold">
                <i class="fas fa-car-alt me-2"></i>إدارة السيارات
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ route('ads.index') }}"
                class="list-group-item list-group-item-action bg-dark text-light {{ request()->routeIs('ads.index') ? 'active-link' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i>الرئيسية
             </a>

                <a href="{{route('Company.index')}}"    class="list-group-item list-group-item-action bg-dark text-light {{ request()->routeIs('Company.index') ? 'active-link' : '' }}">

                    <i class="fas fa-building me-2"></i>شركات السيارات
                </a>
                <a href="{{route('adv.index')}}"   class="list-group-item list-group-item-action bg-dark text-light {{ request()->routeIs('adv.index') ? 'active-link' : '' }}">
                    <i class="fas fa-ad me-2"></i>الإعلانات
                </a>
                <a href="{{route('coment.index')}}" class="list-group-item list-group-item-action bg-dark text-light {{ request()->routeIs('coment.index') ? 'active-link' : '' }}">
                    <i class="fas fa-comments me-2"></i>التعليقات
                </a>
                <a href="{{route('usera.index')}}"  class="list-group-item list-group-item-action bg-dark text-light {{ request()->routeIs('usera.index') ? 'active-link' : '' }}">
                    <i class="fas fa-users me-2"></i>المستخدمين
                </a>

            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-light fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-4 m-0 text-gold">لوحة التحكم</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>المدير
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>الملف الشخصي</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>الإعدادات</a></li>
                                <li><hr class="dropdown-divider">            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class=" text-decoration-none bg-golden border-0 px-3 py-2 rounded">

                                        <i class="fas fa-sign-out me-2 dropdown">تسجيل خروج</i></a>

                                    </button>
                                </form></li>
                                <li></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <!-- Top Navigation End -->

            <!-- Page Content -->
            <div class="container-fluid page-content p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title">الرئيسية</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active">لوحة التحكم</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @yield('admin')

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/dashboard.js"></script>
</body>
</html>
