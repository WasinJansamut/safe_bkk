@extends('layouts.boxed.app')
@section('page_title', 'จุดเสียง')
@section('content')
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-sm table-striped table-bordered table-hover w-100">
                                <thead>
                                    <tr class="ligth text-dark align-middle">
                                        <th class="text-center" rowspan="2">ชื่อสถานที่</th>
                                        <th class="text-center" rowspan="2">ผู้เสียชีวิต<br>(รวม)</th>
                                        <th class="text-center" rowspan="2">ผู้เสียชีวิต<br>5 ปีย้อนหลัง</th>
                                        <th class="text-center" rowspan="2">แขวง</th>
                                        <th class="text-center" rowspan="2">เขต</th>
                                        <th class="text-center" colspan="13">ผู้เสียชีวิตต่อปี</th>
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
                                                <a href="{{ route('risk_point.search', $risk_point->id) }}">
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

            <!-- [Start] Time Chart -->
            <div class="col-sm-12 col-md-6 @if (!$risk_point2) col-lg-4 @endif">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">
                                <i class="fas fa-clock me-1"></i>
                                เวลา
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="time_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [End] Time Chart -->

            <!-- [Start] Age Chart -->
            <div class="col-sm-12 col-md-6 @if (!$risk_point2) col-lg-4 @endif">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">
                                <i class="fas fa-user-clock me-1"></i>
                                อายุ
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="age_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [End] Age Chart -->

            <!-- [Start] Vehicle Chart -->
            <div class="col-sm-12 col-md-6 @if (!$risk_point2) col-lg-4 @endif">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">
                                <i class="fas fa-car-side me-1"></i>
                                พาหนะ
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="vehicle_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [End] Vehicle Chart -->

            <!-- [Start] Image -->
            @if ($risk_point2)
                <div class="col-sm-12 col-md-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="far fa-image me-1"></i>
                                    รูปภาพ
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <a data-fslightbox="gallery"
                                href="{{ asset('upload/' . $risk_point2->cluster . '.png') ?? '' }}">
                                <img src="{{ asset('upload/' . $risk_point2->cluster . '.png') ?? '' }}" width="100%">
                            </a>
                            {{-- <img src="{{ asset('upload/' . $risk_point2->cluster . '.png') ?? '' }}" width="100%"> --}}
                        </div>
                    </div>
                </div>
            @endif
            <!-- [End] Image -->

            <!-- [Start] Google Map  -->
            <div class="col-sm-12 @if ($risk_point2) col-md-6 @endif">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">
                                <i class="fas fa-map me-1"></i>
                                Google Map
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="map" class="w-100" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- [End] Google Map -->

            <!-- [Start] Google Map Street View -->
            @if ($risk_point2)
                <div class="col-sm-12 col-md-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="fas fa-street-view me-1"></i>
                                    Street View
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="street_view" class="w-100" style="height: 400px"></div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- [End] Google Map Street View -->

            <!-- [Start] รายการแต่ละ Case -->
            @if ($id_risk_point)
                <div class="col-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="fas fa-list me-1"></i>
                                    รายการแต่ละ Case
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="ligth text-dark text-center align-middle">
                                            <th>รหัสเคส</th>
                                            <th>วันที่เสียชีวิต</th>
                                            <th>เวลาที่เสียชีวิต</th>
                                            <th>อายุ</th>
                                            <th>เพศ</th>
                                            <th>เขต</th>
                                            <th>พาหนะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($integration_finals as $integration_final)
                                            <tr class="text-center">
                                                <td class="text-dark">
                                                    <a href="" id="modal_view" data-bs-toggle="modal"
                                                        data-bs-target="#modal"
                                                        data-id="{{ $integration_final->DEAD_CONSO_REPORT_ID }}">
                                                        {{ $integration_final->DEAD_CONSO_REPORT_ID ?? '' }}
                                                    </a>
                                                </td>
                                                <td class="text-dark">
                                                    @if ($integration_final->DateRec)
                                                        {{ date('d/m/Y', strtotime($integration_final->DateRec)) ?? '' }}
                                                    @endif
                                                </td>
                                                <td class="text-dark">
                                                    @if ($integration_final->TimeRec)
                                                        {{ date('H:i', strtotime($integration_final->TimeRec)) ?? '' }} น.
                                                    @endif
                                                </td>
                                                <td class="text-dark">{{ $integration_final->Age ?? 0 }}</td>
                                                <td class="text-dark">
                                                    @if ($integration_final->Sex == 1)
                                                        ชาย
                                                    @elseif ($integration_final->Sex == 2)
                                                        หญิง
                                                    @endif
                                                </td>
                                                <td class="text-dark">{{ $integration_final->AccSubDist ?? '' }}</td>
                                                <td class="text-dark">{{ $integration_final->TypeMotor ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- [End] รายการแต่ละ Case -->
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <div id="modal_title"></div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="modal_map" class="w-100" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="modal_street_view" class="w-100" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between flex-wrap">
                                    <div class="header-title">
                                        <h4 class="card-title">
                                            <i class="fas fa-info-circle me-1"></i>
                                            ข้อมูล
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="modal_detail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('#datatable').dataTable({
                "pageLength": 100, // จำนวนข้อมูลต่อหน้า
                "order": [1, 'DESC'], // เรียง ผู้เสียชีวิต (รวม)
                "dom": 'rtip', // ซ่อนช่องค้นหา
                info: false,
                paging: false, // ซ่อนหน้า
            });
        });
    </script>

    <!-- [Start] Time Chart -->
    <script>
        if (document.querySelectorAll('#time_chart').length) {
            var datas = {!! json_encode($count['times']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                if (data.label != 'อื่นๆ') {
                    label.push(data.label);
                    amount.push(data.count);
                }
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 435,
                    width: datas.length * 80,
                },
                colors: ["#3a57e8"],
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '7pt',
                        colors: ["#304758"]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
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
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        // minWidth: 25,
                        // // maxWidth: 25,
                        // style: {
                        //     colors: "#8A92A6",
                        // },
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
    <!-- [End] Time Chart -->

    <!-- [Start] Age Chart -->
    <script>
        if (document.querySelectorAll('#age_chart').length) {
            var datas = {!! json_encode($count['ages']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                if (data.label != 'อื่นๆ') {
                    label.push(data.label);
                    amount.push(data.count);
                }
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 435,
                    width: datas.length * 80,
                },
                colors: ["#3a57e8"],
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '7pt',
                        colors: ["#304758"]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
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
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        // minWidth: 25,
                        // // maxWidth: 25,
                        // style: {
                        //     colors: "#8A92A6",
                        // },
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





            // const options = {
            //     series: [{
            //         name: 'ข้อมูล',
            //         data: amount
            //     }],
            //     chart: {
            //         type: 'bar',
            //         height: 435,
            //         width: 900,
            //         stacked: true,
            //         toolbar: {
            //             show: false
            //         }
            //     },
            //     colors: ["#3a57e8"],
            //     plotOptions: {
            //         bar: {
            //             horizontal: false,
            //             columnWidth: '100%',
            //         },
            //     },
            //     legend: {
            //         show: false
            //     },
            //     dataLabels: {
            //         enabled: false
            //     },
            //     stroke: {
            //         show: true,
            //         width: 2,
            //         colors: ['transparent']
            //     },
            //     xaxis: {
            //         categories: label,
            //         labels: {
            //             minHeight: 30,
            //             maxHeight: 30,
            //             rotate: -90,
            //             style: {
            //                 fontSize: "7pt",
            //             },
            //         }
            //     },
            //     yaxis: {
            //         title: {
            //             text: ''
            //         },
            //         labels: {
            //             minWidth: 25,
            //             // maxWidth: 25,
            //             style: {
            //                 colors: "#8A92A6",
            //             },
            //         },
            //     },
            //     tooltip: {
            //         y: {
            //             formatter: function(val) {
            //                 return "ทั้งหมด " + val.toLocaleString() + " ราย"
            //             }
            //         }
            //     }
            // };
            const chart = new ApexCharts(document.querySelector("#age_chart"), options);
            chart.render();
        }
    </script>
    <!-- [End] Age Chart -->

    <!-- [Start] Vehicle Chart -->
    <script>
        if (document.querySelectorAll('#vehicle_chart').length) {
            var datas = {!! json_encode($count['vehicles']) !!};
            const label = [];
            const amount = [];
            datas.forEach(function(data) {
                if (data.label != 'อื่นๆ') {
                    label.push(data.label);
                    amount.push(data.count);
                }
            })
            const options = {
                series: [{
                    name: 'ข้อมูล',
                    data: amount
                }],
                chart: {
                    type: 'bar',
                    height: 435,
                    width: datas.length * 80,
                },
                colors: ["#3a57e8"],
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '7pt',
                        colors: ["#304758"]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: label,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
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
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        // minWidth: 25,
                        // // maxWidth: 25,
                        // style: {
                        //     colors: "#8A92A6",
                        // },
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
            const chart = new ApexCharts(document.querySelector("#vehicle_chart"), options);
            chart.render();
        }
    </script>
    <!-- [End] Vehicle Chart -->

    <!-- [Start] Modal -->
    <script>
        $('body').on('click', '#modal_view', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.get('integration_final' + '/' + id, function(
                data) {
                $('#modal').modal('show');
                $('#modal_title').html('#' + data.data[0].DEAD_CONSO_REPORT_ID);

                // [Start] Map
                var location = { // กำหนด Lat Long
                    lat: Number(data.data[0].Acc_lat),
                    lng: Number(data.data[0].Acc_long)
                }
                var map = new google.maps.Map(document.getElementById('modal_map'), {
                    center: location,
                    zoom: 8 // Adjust the zoom level as per your preference
                });

                map.setZoom(18);

                // Add markers for each location
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: "{{ asset('assets/images/icons/dead.png') }}",
                    title: data.data[0].DEAD_CONSO_REPORT_ID,
                });
                var sex = null;
                if (data.data[0].Sex == 1) {
                    sex = 'ชาย';
                } else if (data.data[0].Sex == 2) {
                    sex = 'หญิง';
                }
                google.maps.event.addListener(marker, 'click', function() {
                    var infowindow = new google.maps.InfoWindow({
                        content: 'อายุ ' + (data.data[0].Age ?? '-') + ' ปี, ' +
                            'เพศ' + (sex ?? 'ไม่ทราบ') + '<br>' +
                            'พาหนะ' + (data.data[0].TypeMotor ?? 'ไม่ทราบ'),
                        position: location,
                    });
                    infowindow.open(map);
                });
                // [End] Map

                // [Start] Google Map Street View
                var panoramaOptions = {
                    position: location,
                    pov: {
                        heading: 34,
                        pitch: 10,
                    },
                    visible: true,
                };
                var panorama = new google.maps.StreetViewPanorama(
                    document.getElementById("modal_street_view"),
                    panoramaOptions
                );
                // [End] Google Map Street View

                // [Start] รายละเอียด
                // $.each(data.data[0], function(index, value) {
                //     detail += '<div class="col-12">';
                //     detail += index + ' : ' + value;
                //     detail += '</div>';
                // });
                var detail = '<div class="row">';
                detail += '<div class="col-12">รหัสเคส : ' +
                    (data.data[0].DEAD_CONSO_REPORT_ID ?? '-') + '</div>';
                detail += '<div class="col-12">ปีที่เสียชีวิต : ' +
                    (data.data[0].DEAD_YEAR ?? '-') + '</div>';
                detail += '<div class="col-12">AccNo : ' +
                    (data.data[0].AccNo ?? '-') + '</div>';
                detail += '<div class="col-12">อายุ : ' +
                    (data.data[0].Age ?? '-') + '</div>';
                detail += '<div class="col-12">เพศ : ' +
                    (data.data[0].Sex ?? '-') + '</div>';
                detail += '<div class="col-12">ตำบล : ' +
                    (data.data[0].Tumbol ?? '-') + '</div>';
                detail += '<div class="col-12">อำเภอ : ' +
                    (data.data[0].District ?? '-') + '</div>';
                detail += '<div class="col-12">จังหวัด : ' +
                    (data.data[0].Province ?? '-') + '</div>';
                detail += '<div class="col-12">แอลกอฮอล์ : ' +
                    (data.data[0].RiskAlgohol ?? '-') + '</div>';
                detail += '<div class="col-12">หมวกกันน็อค : ' +
                    (data.data[0].RiskHelmet ?? '-') + '</div>';
                detail += '<div class="col-12">เข็มขัดนิรภัย : ' +
                    (data.data[0].RiskSafetyBelt ?? '-') + '</div>';
                detail += '<div class="col-12">วันที่เสียชีวิต (พ.ศ.) : ' +
                    (data.data[0].DeadDate ?? '-') + '</div>';
                detail += '<div class="col-12">วันที่เสียชีวิต (ค.ศ.) : ' +
                    (data.data[0].DeadDate_en ?? '-') + '</div>';
                detail += '<div class="col-12">VictimNO : ' +
                    (data.data[0].VictimNO ?? '-') + '</div>';
                detail += '<div class="col-12">CarProv : ' +
                    (data.data[0].CarProv ?? '-') + '</div>';
                detail += '<div class="col-12">ประเภทพาหนะ : ' +
                    (data.data[0].TypeMotor ?? '-') + '</div>';
                detail += '<div class="col-12">ยี่ห้อพาหนะ : ' +
                    (data.data[0].CarBand ?? '-') + '</div>';
                detail += '<div class="col-12">DrvAddProv : ' +
                    (data.data[0].DrvAddProv ?? '-') + '</div>';
                detail += '<div class="col-12">TpNo : ' +
                    (data.data[0].TpNo ?? '-') + '</div>';
                detail += '<div class="col-12">DateRec : ' +
                    (data.data[0].DateRec ?? '-') + '</div>';
                detail += '<div class="col-12">TimeRec : ' +
                    (data.data[0].TimeRec ?? '-') + '</div>';
                detail += '<div class="col-12">เขต : ' +
                    (data.data[0].AccSubDist ?? '-') + '</div>';
                detail += '<div class="col-12">แขวง : ' +
                    (data.data[0].AccDist ?? '-') + '</div>';
                detail += '<div class="col-12">AccProv : ' +
                    (data.data[0].AccProv ?? '-') + '</div>';
                detail += '<div class="col-12">ละติจูด : ' +
                    (data.data[0].Acc_lat ?? '-') + '</div>';
                detail += '<div class="col-12">ลองติจูด : ' +
                    (data.data[0].Acc_long ?? '-') + '</div>';
                detail += '<div class="col-12">NCAUSE : ' +
                    (data.data[0].NCAUSE ?? '-') + '</div>';
                detail += '</div>';
                detail += '</div>';
                $('#modal_detail').html(detail);
                // [End] รายละเอียด
            })
        });
    </script>
    <!-- [End] Modal -->

    <!-- [Start] Google Map -->
    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnpQL8i0_e09BgynT5s0PAhlYxM1G5Wrw&callback=initMap"></script> --}}
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script>
        initMap();
        // initMap and display the map
        function initMap() {
            // สร้างตัวแปร JavaScript จากข้อมูลที่รับมาจาก Laravel Blade
            var integration_finals = {!! json_encode($integration_finals) !!};
            var risk_point2 = {!! json_encode($risk_point2) !!};

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: risk_point2 ? Number(integration_finals[0].Acc_lat) : 13.6722876,
                    lng: risk_point2 ? Number(integration_finals[0].Acc_long) : 100.3083531
                },
                zoom: 11,
            });

            setTimeout(function() { // แก้บัค marker รวมกันเป็นก้อน
                if (risk_point2) {
                    map.setZoom(18);

                } else {
                    map.setZoom(8);
                }
            }, 1000);

            const markers = []; // ตัวแปรเอาไว้สร้าง Clusterer

            // Add markers for each location
            integration_finals.forEach(function(integration_final) {
                var location = { // กำหนด Lat Long
                    lat: Number(integration_final.Acc_lat),
                    lng: Number(integration_final.Acc_long)
                }
                let marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: "{{ asset('assets/images/icons/dead.png') }}",
                    title: integration_final.DEAD_CONSO_REPORT_ID,
                });
                var sex = null;
                if (integration_final.Sex == 1) {
                    sex = 'ชาย';
                } else if (integration_final.Sex == 2) {
                    sex = 'หญิง';
                }
                google.maps.event.addListener(marker, 'click', function() {
                    var infowindow = new google.maps.InfoWindow({
                        content: 'อายุ ' + (integration_final.Age ?? '-') + ' ปี, ' +
                            'เพศ' + (sex ?? 'ไม่ทราบ') + '<br>' +
                            'พาหนะ' + (integration_final.TypeMotor ?? 'ไม่ทราบ'),
                        position: location,
                    });
                    infowindow.open(map);
                });
                markers.push(marker); // สร้าง Clusterer
            });

            new markerClusterer.MarkerClusterer({ // สร้าง Clusterer
                map,
                markers
            });

            // [Start] Google Map Street View
            if (risk_point2) {
                var panoramaOptions = {
                    position: {
                        lat: Number(risk_point2.acc_lat),
                        lng: Number(risk_point2.acc_long)
                    },
                    pov: {
                        heading: 34,
                        pitch: 10,
                    },
                    visible: true,
                };
                var panorama = new google.maps.StreetViewPanorama(
                    document.getElementById("street_view"),
                    panoramaOptions
                );
            }
            // [End] Google Map Street View
        };
    </script>
    <!-- [End] Google Map -->
@endsection
