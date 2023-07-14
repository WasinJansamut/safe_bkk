@extends('layouts.boxed.app')
@section('page_title', 'จุดเสียง')
@section('content')
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="ligth text-dark text-center align-middle">
                                        <th rowspan="2">ชื่อสถานที่</th>
                                        <th rowspan="2">ผู้เสียชีวิต<br>(รวม)</th>
                                        <th rowspan="2">ผู้เสียชีวิต<br>5 ปีย้อนหลัง</th>
                                        <th rowspan="2">แขวง</th>
                                        <th rowspan="2">เขต</th>
                                        <th colspan="13">ผู้เสียชีวิตต่อปี</th>
                                    </tr>
                                    <tr class="ligth text-dark text-center">
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
                                                <a href="#" class="text-dark">
                                                    {{ $risk_point->remark ?? '' }}
                                                </a>
                                            </td>
                                            <td class="text-dark">{{ $risk_point->total_death ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->death_in_last_5_year ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->subdistrict ?? '' }}</td>
                                            <td class="text-dark">{{ $risk_point->district ?? '' }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2554 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2555 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2556 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2557 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2558 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2559 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2560 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2561 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2562 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2563 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2564 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2565 ?? 0 }}</td>
                                            <td class="text-dark">{{ $risk_point->year_2566 ?? 0 }}</td>
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
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">เวลา</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="time_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Time Chart End -->

            <!-- Age Chart Start -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">อายุ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="age_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Age Chart End -->

            <!-- Vehicle Chart Start -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">พาหนะ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="vehicle_chart"></div>
                        </div>
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

            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">รายการแต่ละ Case</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="text-align: justify">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, dolore porro beatae earum hic
                            dolorum fugiat et nostrum aut fuga. Sequi dolores adipisci delectus quo fugiat distinctio dicta
                            assumenda deserunt fugit temporibus perferendis, ad rem quae animi tenetur eligendi minus
                            quisquam impedit itaque dolorem libero excepturi! Possimus, quae necessitatibus. Ullam accusamus
                            sint placeat quos eius dolor unde dignissimos aperiam, quam maiores aliquam necessitatibus nemo.
                            Distinctio, cum impedit sapiente amet aspernatur assumenda, quibusdam, enim repellat culpa vero
                            nemo velit doloremque iure voluptatem unde est aliquid cupiditate eum ab voluptatum et nam
                            deleniti. Error aliquam quasi sit excepturi suscipit aspernatur dicta ad quos aut eos. Minima,
                            unde dolor et dolorem nostrum quam similique nisi odio ut quos ipsum optio quia. Aliquam
                            voluptatum fuga dicta provident sint nobis quaerat magni, praesentium quidem modi perferendis
                            expedita ab a vero temporibus earum, itaque doloribus consequuntur rerum officia omnis sit,
                            aliquid blanditiis. Molestias, dignissimos atque ducimus recusandae porro doloremque facilis
                            nemo odio reprehenderit praesentium ab quia nam excepturi tempore ullam sed expedita eius. Modi
                            illo recusandae tenetur rem quaerat aperiam nemo, porro debitis, molestias pariatur saepe atque
                            earum velit, beatae praesentium necessitatibus eaque libero blanditiis officiis animi! Eaque
                            adipisci, error quibusdam non repudiandae beatae unde corporis!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Time Chart Start -->
    <script>
        if (document.querySelectorAll('#time_chart').length) {
            var datas = {!! json_encode($count['times']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                label.push(data.label);
                amount.push(data.count);
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 400,
                    width: 1100,
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
                        minHeight: 30,
                        maxHeight: 30,
                        rotate: -90,
                        style: {
                            fontSize: "7pt",
                        },
                    },
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 19,
                        // maxWidth: 19,
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
                },
            };
            const chart = new ApexCharts(document.querySelector("#time_chart"), options);
            chart.render();
        }
    </script>
    <!-- Time Chart End -->

    <!-- Age Chart Start -->
    <script>
        if (document.querySelectorAll('#age_chart').length) {
            var datas = {!! json_encode($count['ages']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                label.push(data.label);
                amount.push(data.count);
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 400,
                    width: 950,
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
                        minHeight: 30,
                        maxHeight: 30,
                        rotate: -90,
                        style: {
                            fontSize: "7pt",
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 25,
                        // maxWidth: 25,
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
        }
    </script>
    <!-- Age Chart End -->

    <!-- Vehicle Chart Start -->
    <script>
        if (document.querySelectorAll('#vehicle_chart').length) {
            var datas = {!! json_encode($count['vehicles']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                label.push(data.label);
                amount.push(data.count);
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 415,
                    width: 500,
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
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    labels: {
                        minHeight: 30,
                        maxHeight: 65,
                        // rotate: -90,
                        style: {
                            fontSize: "7pt",
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 25,
                        // maxWidth: 200,
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
        }
    </script>
    <!-- Vehicle Chart End -->

    <!-- Google Map Start -->
    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnpQL8i0_e09BgynT5s0PAhlYxM1G5Wrw&callback=initMap"></script> --}}
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
                var location_marker = { // กำหนด Lat Long
                    lat: Number(integration_final.Acc_lat),
                    lng: Number(integration_final.Acc_long)
                }
                var marker = new google.maps.Marker({
                    position: location_marker,
                    map: map,
                    icon: "{{ asset('assets/images/icons/dead.png') }}",
                    title: integration_final.DEAD_CONSO_REPORT_ID,
                });
                google.maps.event.addListener(marker, 'click', function() {
                    var infowindow = new google.maps.InfoWindow({
                        content: integration_final.DEAD_CONSO_REPORT_ID,
                        position: location_marker,
                    });
                    infowindow.open(map);
                });
            });
        };
    </script>
    <!-- Google Map End -->
@endsection
