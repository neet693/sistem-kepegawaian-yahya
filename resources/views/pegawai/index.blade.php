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

            <!-- Card Laki - Laki -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Laki - Laki</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lk }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Perempuan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Perempuan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pr }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card User -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
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
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Karyawan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Karyawan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pegawai }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        {{-- <div class="row">

            <!-- Welcome Greeting -->
            <div class="col-xl-6 col-lg-5">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="img/undraw_posting_photo.svg" alt="...">
                        </div>
                        <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                                href="https://undraw.co/">unDraw</a>, a
                            constantly updated collection of beautiful svg images that you can use
                            completely free and without attribution!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations
                            on
                            unDraw &rarr;</a>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
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
