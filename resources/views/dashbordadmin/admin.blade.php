@extends('layouts.admin')
@section('admin')
    <!-- Main Container -->

        <!-- Sidebar End -->


                <!-- Statistics Cards -->
                <div class="row mt-3">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs fw-bold text-gold text-uppercase mb-1">
                                            شركات السيارات
                                        </div>
                                        <div class="h3 mb-0 fw-bold">{{$sellerCount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-building fa-2x text-gold-light"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs fw-bold text-gold text-uppercase mb-1">
                                            الإعلانات النشطة
                                        </div>
                                        <div class="h3 mb-0 fw-bold">{{$aderCount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-ad fa-2x text-gold-light"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs fw-bold text-gold text-uppercase mb-1">
                                            الشكاوي
                                        </div>
                                        <div class="h3 mb-0 fw-bold">{{$ComplainterCount}}</div>
                                    </div>

                                </div>
                                <div class="mt-2 mb-0 text-muted text-sm">
                                    <span class="text-warning me-2"><i class="fas fa-arrow-down"></i> 3%</span>
                                    <span>منذ الأسبوع الماضي</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs fw-bold text-gold text-uppercase mb-1">
                                        التقيمات
                                        </div>
                                        <div class="h3 mb-0 fw-bold">{{$RatingerCount }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gold-light"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row mt-3">
                    <!-- أكثر الشركات نشاطًا -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-header bg-gold-light py-3">
                                <h6 class="m-0 fw-bold">أكثر الشركات نشاطًا</h6>
                            </div>
                            <div class="card-body" style="height: 300px;">
                                <canvas id="companiesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- توزيع السيارات المباعة وغير المباعة -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow h-100">
                            <div class="card-header bg-gold-light py-3">
                                <h6 class="m-0 fw-bold">توزيع السيارات المباعة وغير المباعة</h6>
                            </div>
                            <div class="card-body d-flex justify-content-center" style="height: 250px;">
                                <canvas id="soldVsUnsoldChart" style="max-width: 100%; max-height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header bg-gold-light py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 fw-bold">أحدث النشاطات</h6>
                                <div class="dropdown">
                                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                                <li class="px-3">
                                                    <form method="GET" action="{{ route('ads.index') }}">
                                                        <select name="filter" class="form-control mb-2" style="color: #333">
                                                            <option value="">عرض الكل</option>
                                                            <option value="ads" @selected(request('filter') == 'ads')>إعلانات فقط</option>
                                                            <option value="comments" @selected(request('filter') == 'comments')>تعليقات فقط</option>
                                                            <option value="companies" @selected(request('filter') == 'companies')>شركات فقط</option>
                                                            <option value="ratings" @selected(request('filter') == 'ratings')>تقييمات فقط</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-outline-success btn-sm w-100">فلترة</button>
                                                    </form>
                                                </li>



                                           </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    @foreach ($ade as $ade )
                                    <div class="timeline-item">
                                        <div class="timeline-date">{{$ade->created_at}}</div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">تسجيل شركة جديدة</h6>
                                            <p class="mb-0">{{$ade->full_name}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($usesat as $usesat )
                                    <div class="timeline-item">
                                        <div class="timeline-date">{{$usesat->created_at}}</div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">تسجيل شركة جديدة</h6>
                                            <p class="mb-0">{{$usesat->name}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($Complaint as $Complaint )
                                    <div class="timeline-item">
                                        <div class="timeline-date">{{$Complaint->created_at}}</div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">تعليق جديد</h6>
                                            <p class="mb-0">{{$Complaint->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($rat as $rat )


                                    <div class="timeline-item">
                                        <div class="timeline-date">{{$rat->created_at}}</div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">تقيم جديد</h6>
                                            <p class="mb-0">{{$rat->comment}}</p>
                                        </div>
                                    </div> @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Content End -->
        </div>
        <!-- Page Content Wrapper End -->
    </div>
    <!-- Main Conta
        iner End -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // بيانات الشركات الأكثر نشاطًا
            const companyNames = {!! json_encode($topCompanies->pluck('name')) !!};
            const soldCounts = {!! json_encode($topCompanies->pluck('sold_cars_count')) !!};

            const companiesCtx = document.getElementById('companiesChart').getContext('2d');

            new Chart(companiesCtx, {
                type: 'bar',
                data: {
                    labels: companyNames,
                    datasets: [{
                        label: 'عدد السيارات المباعة',
                        data: soldCounts,
                        backgroundColor: 'rgba(212, 175, 55, 0.7)',
                        borderColor: 'rgba(212, 175, 55, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // بيانات السيارات المباعة وغير المباعة
            const soldUnsoldCtx = document.getElementById('soldVsUnsoldChart').getContext('2d');

            new Chart(soldUnsoldCtx, {
                type: 'pie',
                data: {
                    labels: ['سيارات مباعة', 'سيارات غير مباعة'],
                    datasets: [{
                        label: 'عدد السيارات',
                        data: [{{ $soldCarsCount }}, {{ $unsoldCarsCount }}],
                        backgroundColor: [
                            'rgba(212, 175, 55, 0.8)',
                            'rgba(212, 175, 55, 0.6)'
                        ],
                        borderColor: [
                            'rgba(212, 175, 55, 1)',
                            'rgba(212, 175, 55, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' سيارات';
                                }
                            }
                        }
                    }
                }
            });
        </script>

@endsection
