@extends('layouts.fix')
@section('title', ' Grafik Data Karyawan')
@section('konten')
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="card p-3 mb-3">
            <!-- start tambah jabatan -->


            <!-- Resources -->
            <script src="{{ asset('amChart/core.js') }}"></script>
            <script src="{{ asset('amChart/chart.js') }}"></script>
            <script src="{{ asset('amChart/animated.js') }}"></script>


            <script>
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("chartdiv3", am4charts.PieChart);

                    // Add data
                    chart.data = [{
                            country: "Unit TKK",
                            litres: {{ $akat }}
                        },
                        {
                            country: "Unit SDK",
                            litres: {{ $bkat }}
                        },
                        {
                            country: "Unit SMP",
                            litres: {{ $ckat }}
                        },
                        {
                            country: "Unit SMA",
                            litres: {{ $dkat }}
                        }
                    ];

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "litres";
                    pieSeries.dataFields.category = "country";
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;

                    // This creates initial animation
                    pieSeries.hiddenState.properties.opacity = 1;
                    pieSeries.hiddenState.properties.endAngle = -90;
                    pieSeries.hiddenState.properties.startAngle = -90;

                }); // end am4core.ready()
            </script>

            <!-- Chart code Laki Vs Perempuan -->
            <script>
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("chartdiv", am4charts.PieChart);

                    // Add data
                    chart.data = [{
                        "country": "Laki-laki",
                        "litres": {{ $lk }}
                    }, {
                        "country": "Perempuan",
                        "litres": {{ $pr }}
                    }];

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "litres";
                    pieSeries.dataFields.category = "country";
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;

                    // This creates initial animation
                    pieSeries.hiddenState.properties.opacity = 1;
                    pieSeries.hiddenState.properties.endAngle = -90;
                    pieSeries.hiddenState.properties.startAngle = -90;

                }); // end am4core.ready()
            </script>



            <!-- Chart code -->
            <script>
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    var chart = am4core.create("chartdiv2", am4charts.PieChart3D);
                    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                    chart.legend = new am4charts.Legend();

                    chart.data = [{
                            country: "Menikah",
                            litres: {{ $menikah }}
                        },
                        {
                            country: "Belum Menikah",
                            litres: {{ $bmenikah }}
                        }
                    ];

                    var series = chart.series.push(new am4charts.PieSeries3D());
                    series.dataFields.value = "litres";
                    series.dataFields.category = "country";

                }); // end am4core.ready()
            </script>



            <!-- HTML -->
            <div class="row">
                <div class="col-md-12">
                    <label>
                        <h4>Grafik per Unit</h4>
                    </label>
                    <div id="chartdiv3"></div>
                </div>
            </div>

            <div class="row m-2"></div>

            <div class="row">
                <div class="col-md-12">
                    <label>
                        <h4>Laki-laki VS Perempuan</h4>
                    </label>
                    <div id="chartdiv"></div>
                </div>
            </div>

            <div class="row m-2"></div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <label>
                        <h4>Menikah VS Belum Menikah</h4>
                    </label>
                    <div id="chartdiv2"></div>
                </div>
            </div>

        </div>
    </div>
@endsection
