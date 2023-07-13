@extends('layouts.boxed.app')
@section('page_title', 'หน้าหลัก')
@section('content')
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="ligth text-center justify-content-center align-middle">
                                        <th>Remark</th>
                                        <th>Total Death</th>
                                        <th>Death in<br>Last 5 Year</th>
                                        <th>Subdistrict</th>
                                        <th>District</th>
                                        <th>2554</th>
                                        <th>2555</th>
                                        <th>2556</th>
                                        <th>2557</th>
                                        <th>2558</th>
                                        <th>2559</th>
                                        <th>2560</th>
                                        <th>2561</th>
                                        <th>2562</th>
                                        <th>2563</th>
                                        <th>2564</th>
                                        <th>2565</th>
                                        <th>2566</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($risk_points as $risk_point)
                                        <tr class="text-center">
                                            <td class="text-start">
                                                <a href="" class="text-dark">
                                                    {{ $risk_point->remark ?? '' }}
                                                </a>
                                            </td>
                                            <td>{{ $risk_point->total_death ?? 0 }}</td>
                                            <td>{{ $risk_point->death_in_last_5_year ?? 0 }}</td>
                                            <td>{{ $risk_point->subdistrict ?? '' }}</td>
                                            <td>{{ $risk_point->district ?? '' }}</td>
                                            <td>{{ $risk_point->year_2554 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2555 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2556 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2557 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2558 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2559 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2560 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2561 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2562 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2563 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2564 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2565 ?? 0 }}</td>
                                            <td>{{ $risk_point->year_2566 ?? 0 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Time Chart Start -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">Time</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="time_chart"></div>
                    </div>
                </div>
            </div>
            <!-- Time Chart End -->

            <!-- Age Chart Start -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">Age</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="age_chart"></div>
                    </div>
                </div>
            </div>
            <!-- Age Chart End -->

            <!-- Vehicle Chart Start -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">Vehicle</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="vehicle_chart"></div>

                    </div>
                </div>
            </div>
            <!-- Vehicle Chart End -->

            <!-- Google Map Start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">Google Map</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="map" class="w-100" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- Google Map End -->
        </div>
    </div>
@endsection

@section('script')
    <!-- Age Chart Start -->
    <script>
        if (document.querySelectorAll('#age_chart').length) {
            var datas = {!! json_encode($count['ages']) !!};
            const label = [];
            datas.forEach(function(data) {
                label.push(data.Age);
            })
            const amount = [];
            datas.forEach(function(data) {
                amount.push(data.count);
            })

            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 230,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                colors: ["#3a57e8"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '100%',
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    labels: {
                        minHeight: 20,
                        maxHeight: 20,
                        style: {
                            colors: "#8A92A6",
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 19,
                        maxWidth: 19,
                        style: {
                            colors: "#8A92A6",
                        },
                    },
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "ทั้งหมด " + val.toLocaleString() + " ราย"
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#age_chart"), options);
            chart.render();
            document.addEventListener('ColorChange', (e) => {
                const newOpt = {
                    colors: [e.detail.detail1, e.detail.detail2],
                }
                chart.updateOptions(newOpt)
            })
        }
    </script>
    <!-- Age Chart End -->

    <!-- Vehicle Chart Start -->
    <script>
        if (document.querySelectorAll('#vehicle_chart').length) {
            var datas = {!! json_encode($count['vehicles']) !!};
            const label = [];
            datas.forEach(function(data) {
                label.push(data.TypeMotor);
            })
            const amount = [];
            datas.forEach(function(data) {
                amount.push(data.count);
            })

            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 230,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                colors: ["#3a57e8"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '100%',
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    labels: {
                        minHeight: 20,
                        maxHeight: 20,
                        style: {
                            colors: "#8A92A6",
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 19,
                        maxWidth: 19,
                        style: {
                            colors: "#8A92A6",
                        },
                    },
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "ทั้งหมด " + val.toLocaleString() + " ราย"
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#vehicle_chart"), options);
            chart.render();
            document.addEventListener('ColorChange', (e) => {
                const newOpt = {
                    colors: [e.detail.detail1, e.detail.detail2],
                }
                chart.updateOptions(newOpt)
            })
        }
    </script>
    <!-- Vehicle Chart End -->

    <!-- Google Map Start -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnpQL8i0_e09BgynT5s0PAhlYxM1G5Wrw&callback=initMap"></script>
    <script>
        initMap();
        // initMap and display the map
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 13.6722876,
                    lng: 100.3083531,
                }, // Replace with the desired center coordinates
                zoom: 8 // Adjust the zoom level as per your preference
            });

            // สร้างตัวแปร JavaScript จากข้อมูลที่รับมาจาก Laravel Blade
            var integration_finals = {!! json_encode($integration_finals) !!};

            // Add markers for each location
            integration_finals.forEach(function(integration_final) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: Number(integration_final.Acc_lat),
                        lng: Number(integration_final.Acc_long)
                    },
                    map: map,
                    icon: "{{ asset('assets/images/icons/dead.png') }}",
                    title: integration_final.AccSubDist
                });
            });
        };
    </script>
    <!-- Google Map End -->
@endsection
