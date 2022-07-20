@extends('layouts.fix')
@section('title', 'Dashboard')
@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col lg-6 card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Dahboard Informasi</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <!-- row akun -->
                        <div class="row mb-4">
                            <!-- Card Laki - Laki -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Laki - Laki</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lk }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-male fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Perempuan -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Perempuan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pr }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-female fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card User -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            {{ $total_user }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Card Karyawan -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Karyawan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pegawai }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row perunit -->
                        <div class="row mb-4">
                            <!-- Row 1,1-->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                                    Guru Unit TK</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tk }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2,1-->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                                    Guru Unit SD</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sd }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3,1-->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                                    Guru Unit SMP</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $smp }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4,1-->
                            <div class="col-xl-3 col-md-6">
                                <div class="card border-bottom-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-grey text-uppercase mb-1">
                                                    Guru Unit SMA</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sma }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 p-3">

            <!-- Resources -->
            <script src="{{ asset('amChart/core.js') }}"></script>
            <script src="{{ asset('amChart/chart.js') }}"></script>
            <script src="{{ asset('amChart/animated.js') }}"></script>

            <!-- Chart code -->
            <script>
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("chartdiv", am4charts.XYChart);

                    // Add data
                    chart.data = [
                        @foreach ($pegawai as $pegawai)
                            {
                                "name": "{{ $pegawai->nama }}",
                                @foreach ($pegawai->naikkgb as $pn)
                                    "points": "{{ $pn->gapok->gapok }}",
                                @endforeach
                                "color": chart.colors.next(),
                                "bullet": "foto/{{ $pegawai->foto }}"
                            },
                        @endforeach
                    ];

                    // Create axes
                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "name";
                    categoryAxis.renderer.grid.template.disabled = true;
                    categoryAxis.renderer.minGridDistance = 30;
                    categoryAxis.renderer.inside = true;
                    categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
                    categoryAxis.renderer.labels.template.fontSize = 20;

                    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.renderer.grid.template.strokeDasharray = "4,4";
                    valueAxis.renderer.labels.template.disabled = true;
                    valueAxis.min = 0;

                    // Do not crop bullets
                    chart.maskBullets = false;

                    // Remove padding
                    chart.paddingBottom = 0;

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries());
                    series.dataFields.valueY = "points";
                    series.dataFields.categoryX = "name";
                    series.columns.template.propertyFields.fill = "color";
                    series.columns.template.propertyFields.stroke = "color";
                    series.columns.template.column.cornerRadiusTopLeft = 15;
                    series.columns.template.column.cornerRadiusTopRight = 15;
                    series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

                    // Add bullets
                    var bullet = series.bullets.push(new am4charts.Bullet());
                    var image = bullet.createChild(am4core.Image);
                    image.horizontalCenter = "middle";
                    image.verticalCenter = "bottom";
                    image.dy = 20;
                    image.y = am4core.percent(100);
                    image.propertyFields.href = "bullet";
                    image.tooltipText = series.columns.template.tooltipText;
                    image.propertyFields.fill = "color";
                    image.filters.push(new am4core.DropShadowFilter());

                }); // end am4core.ready()
            </script>

            <!-- HTML -->
            <div id="chartdiv"></div>
        </div>
    </div>
@endsection
