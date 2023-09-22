@extends('layouts.boxed.app')
@section('page_title', 'ผลวิเคราะห์ความสัมพันธ์เชิงพื้นที่ระหว่างลักษณะเมืองและการเกิดอุบัติเหตุในพื้นที่เสี่ยง')
@section('style')
    <style>
        .bookshelf {
            display: flex;
            flex-wrap: wrap;
        }

        .book {
            width: 100px;
            height: 120px;
            /* border: 2px dotted #3A57E8; */
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .book img {
            max-width: 80%;
            max-height: 80%;
            position: relative;
            opacity: 0.5;
            box-shadow: 10px 10px 5px #888888;
        }
    </style>
@endsection
<link rel="stylesheet" href="{{ asset('assets/datatables/buttons/2.4.1/css/buttons.dataTables.min.css') }}" />
@section('content')
    <div class="conatiner-fluid content-inner pb-0">
        <div class="row">
            @if ($risk_point2)
                <div class="col-12 mb-4">
                    <div class="text-center">
                        <h1>{{ $risk_point2->remark }}</h1>
                        <p>เลื่อนลงด้านล่างเพื่อดูข้อมูลความเสี่ยง</p>
                        <p><i class="fas fa-angle-double-down"></i></p>
                    </div>
                </div>
            @endif

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
                                                    @if ($risk_point->cctv_id)
                                                        <i class="fas fa-video ms-1" style="font-size: 12px"></i>
                                                    @endif
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
            <div class="col-sm-12 col-md-5">
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
            <div class="col-sm-12 col-md-5">
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
            <div class="col-sm-12 col-md-2">
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

            @if ($risk_point2)
                <!-- [Start] จุดเสี่ยง -->
                @if ($risk_point2->youtube_url)
                    <div class="col-sm-12 col-md-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="600">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title">
                                        <i class="fa-brands fa-youtube me-1"></i>
                                        จุดเสี่ยง {{ $risk_point2->remark ?? '' }}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @php
                                    $parsed_url = parse_url($risk_point2->youtube_url);
                                    parse_str($parsed_url['query'], $query); // แยกค่าพารามิเตอร์ของ URL
                                @endphp
                                <iframe width="100%" height="465"
                                    src="https://www.youtube.com/embed/{{ $query['v'] }}" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- [End] จุดเสี่ยง -->

                <!-- [Start] บทวิเคราะห์ -->
                <div class="col-sm-12 @if ($risk_point2->youtube_url) col-md-6 @endif">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-line me-1"></i>
                                    บทวิเคราะห์
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <a data-fslightbox="gallery"
                                href="{{ asset('upload/' . $risk_point2->cluster . '.png') ?? '' }}">
                                <img src="{{ asset('upload/' . $risk_point2->cluster . '.png') ?? '' }}" width="100%">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- [End] บทวิเคราะห์ -->
            @endif

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

            @if ($id_risk_point)
                <!-- [Start] รายการแต่ละ Case -->
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
                                            <th>วันที่เกิดเหตุ</th>
                                            <th>เวลาที่เกิดเหตุ</th>
                                            <th>อายุ</th>
                                            <th>เพศ</th>
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
                                                @php
                                                    $timeRec = strtotime($integration_final->TimeRec);
                                                    $timeOfDay = '';
                                                    
                                                    if ($timeRec >= strtotime('05:00:00') && $timeRec < strtotime('12:00:00')) {
                                                        $timeOfDay = 'เช้า';
                                                        $colorClass = '#87CEFA;';
                                                        $text_color = 'text-dark';
                                                    } elseif ($timeRec >= strtotime('12:00:00') && $timeRec < strtotime('17:00:00')) {
                                                        $timeOfDay = 'กลางวัน';
                                                        $colorClass = '#00BFFF;';
                                                        $text_color = 'text-dark';
                                                    } elseif ($timeRec >= strtotime('17:00:00') && $timeRec < strtotime('19:00:00')) {
                                                        $timeOfDay = 'เย็น';
                                                        $colorClass = '#1E90FF;';
                                                        $text_color = 'text-dark';
                                                    } elseif ($timeRec >= strtotime('19:00:00') && $timeRec < strtotime('23:59:59')) {
                                                        $timeOfDay = 'หัวค่ำ';
                                                        $colorClass = '#4169E1;';
                                                        $text_color = 'text-white';
                                                    } elseif ($timeRec >= strtotime('00:00:00') && $timeRec < strtotime('04:59:59')) {
                                                        $timeOfDay = 'กลางคืน';
                                                        $colorClass = '#0000FF;';
                                                        $text_color = 'text-white';
                                                    } else {
                                                        $timeOfDay = 'กลางคืน';
                                                        $colorClass = '#FFFFFF;';
                                                        $text_color = 'text-dark';
                                                    }
                                                @endphp
                                                <td class="{{ $text_color ?? '' }}"
                                                    style="background-color: {{ $colorClass ?? '' }}">
                                                    @if ($integration_final->TimeRec)
                                                        <span class="{{ $colorClass }}">{{ $timeOfDay }}</span> /

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
                                                <td class="text-dark">{{ $integration_final->TypeMotor ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [End] รายการแต่ละ Case -->

                <!-- [Start] ไฟล์ -->
                <div class="col-9" id="div_file">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="fas fa-book me-1"></i>
                                    สื่อ, VDO
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($files)
                                <div class="bookshelf" id="bookshelf">
                                    @foreach ($files as $file)
                                        <a href="{{ asset("upload/doc/{$risk_point2->id}/{$file['name']}") }}"
                                            target="_blank">
                                            <div class="credit-card-widget custom-card-width"
                                                style="width: 210px; padding: 5px; ">
                                                <div class="pb-4 border-0 card-header">
                                                    <div class="p-4 border border-white rounded primary-gradient-card">
                                                        <div class="book">
                                                            @php($type = $file['type'])
                                                            @if ($type === 'pdf')
                                                                <img src="{{ asset('images/pdf.png') }}" alt="PDF">
                                                            @elseif ($type === 'ppt')
                                                                <img src="{{ asset('images/ppt.png') }}" alt="PPT">
                                                            @elseif ($type === 'doc')
                                                                <img src="{{ asset('images/doc.png') }}" alt="DOC">
                                                            @elseif ($type === 'rar')
                                                                <img src="{{ asset('images/rar.png') }}" alt="RAR">
                                                            @elseif ($type === 'zip')
                                                                <img src="{{ asset('images/zip.png') }}" alt="ZIP">
                                                            @elseif ($type === 'jpeg' || $type === 'jpg' || $type === 'png')
                                                                <img src="{{ asset('images/image.png') }}"
                                                                    alt="IMAGE">
                                                            @elseif ($type === 'mp4' || $type === 'm4v' || $type === 'mov' || $type === 'mpg' || $type === 'mpeg' || $type === 'wmv')
                                                                <a href="#div_file">
                                                                    <video controls="controls" width="100%"
                                                                        class="rounded">
                                                                        <source
                                                                            src="{{ asset("upload/doc/{$risk_point2->id}/{$file['name']}") }}">
                                                                    </video>
                                                                </a>
                                                            @else
                                                                <img src="{{ asset('images/file.png') }}" alt="FILE">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-primary text-center">{{ $file['name'] ?? '' }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                ไม่พบข้อมูล
                            @endif
                        </div>
                    </div>
                </div>
                <!-- [End] ไฟล์ -->

                <!-- [Start] กล้องวงจรปิด -->
                <div class="col-3">
                    <div class="card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    <i class="fas fa-video me-1"></i>
                                    กล้องวงจรปิด กทม. Realtime
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($cctvs)
                                <ul>
                                    @foreach ($cctvs as $cctv)
                                        <li>
                                            <a href="http://www.bmatraffic.com/PlayVideo.aspx?ID={{ $cctv[0] }}"
                                                target="_blank">
                                                {{-- <img src="{{ asset('images/cctv.png') }}" class="me-1" width="24">
                                                    {{ $cctv[1] }} --}}
                                                {{ $cctv[1] }} ({{ $cctv[0] }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                ไม่พบข้อมูล
                            @endif
                        </div>
                    </div>
                </div>
                <!-- [End] กล้องวงจรปิด -->
            @endif

            <!-- [Start] Facebook Comment -->
            <div class="col-12">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">
                                <i class="fab fa-facebook-square"></i>
                                Facebook Comment
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <meta property="fb:app_id" content="805417391080641" />
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v17.0"
                            nonce="QL47gskZ"></script>
                        <div class="fb-comments" data-href="{{ url()->full() }}" data-width="100%" data-numposts="5"
                            data-order-by="reverse_time"></div>
                    </div>
                </div>
            </div>
            <!-- [End] Facebook Comment -->
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
                    // "dom": 'rtip', // ซ่อนช่องค้นหา
                    "dom": 'Bfrtip',
                    "buttons": [{
                            "extend": 'excel',
                            "text": '<i class="fa-solid fa-file-pdf"></i> รายงานผลงานวิจัย มุ่งเป้าลดตายและบาดเจ็บ สาหัสของผู้ใช้ มอเตอร์ไซค์ในเมืองหลวง',
                            "className": 'btn btn-success rounded-pill',
                            "action": function(e, dt, button, config) {
                                window.open(
                                    "{{ asset('assets/file/pdf/(ร่าง) เล่มฉบับสมบูรณ์ FINAL 27-08-2023 (1350).pdf') }}",
                                    '_blank');
                            }
                        },
                        {
                            "extend": 'excel',
                            "text": '<i class="fas fa-file-excel"></i> Export Excel',
                            "className": 'btn btn-primary rounded-pill',

                        }
                    ],
                    info: false,
                    paging: false, // ซ่อนหน้า
                });
            });
        </script>
        <script src="{{ asset('assets/datatables/buttons/2.4.1/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/buttons/2.4.1/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/buttons/2.4.1/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/jszip/3.10.1/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/pdfmake/0.1.53/vfs_fonts.js') }}"></script>

        <!-- [Start] Time Chart -->
        <script>
            if (document.querySelectorAll('#time_chart').length) {
                var datas = {!! json_encode($count['times']) !!};
                var label = [];
                var amount = [];
                datas.forEach(function(data) {
                    if (data.label != 'อื่นๆ') {
                        label.push(data.label);
                        amount.push(data.count);
                    }
                })
                Highcharts.chart('time_chart', {
                    chart: {
                        type: 'column',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: label,
                        crosshair: true,
                        accessibility: {
                            description: 'Countries'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'จำนวน (ราย)'
                        }
                    },
                    plotOptions: {
                        column: {
                            borderRadius: '50%',
                            pointPadding: 0.1,
                            borderWidth: 0,
                            groupPadding: 0,
                            pointWidth: 17
                        }
                    },
                    series: [{
                        data: amount
                    }],
                    colorAxis: {
                        minColor: '#3A57E8', // ฟ้า
                        maxColor: '#FF0000', // แดง
                    },
                    tooltip: {
                        formatter: function() {
                            return this.x + '<br><b>ข้อมูล ' + this.y + ' ราย</b>';
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    legend: false,
                });
            }
        </script>
        <!-- [End] Time Chart -->

        <!-- [Start] Age Chart -->
        <script>
            if (document.querySelectorAll('#age_chart').length) {
                var datas = {!! json_encode($count['ages']) !!};
                var label = [];
                var amount = [];
                datas.forEach(function(data) {
                    if (data.label != 'อื่นๆ') {
                        label.push(data.label);
                        amount.push(data.count);
                    }
                });
                Highcharts.chart('age_chart', {
                    chart: {
                        type: 'column',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: label,
                        crosshair: true,
                        accessibility: {
                            description: 'Countries'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'จำนวน (ราย)'
                        }
                    },
                    plotOptions: {
                        column: {
                            borderRadius: '50%',
                            pointPadding: 0.1,
                            borderWidth: 0,
                            groupPadding: 0,
                            pointWidth: 17
                        }
                    },
                    series: [{
                        data: amount
                    }],
                    colorAxis: {
                        minColor: '#3A57E8', // ฟ้า
                        maxColor: '#FF0000', // แดง
                    },
                    tooltip: {
                        formatter: function() {
                            return this.x + '<br><b>ข้อมูล ' + this.y + ' ราย</b>';
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    legend: false,
                });
            }
        </script>
        <!-- [End] Age Chart -->

        <!-- [Start] Vehicle Chart -->
        <script>
            if (document.querySelectorAll('#vehicle_chart').length) {
                var datas = {!! json_encode($count['vehicles']) !!};
                var label = [];
                var amount = [];
                datas.forEach(function(data) {
                    if (data.label != 'อื่นๆ') {
                        label.push(data.label);
                        amount.push(data.count);
                    }
                });
                Highcharts.chart('vehicle_chart', {
                    chart: {
                        type: 'column',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: label,
                        crosshair: true,
                        accessibility: {
                            description: 'Countries'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'จำนวน (ราย)'
                        }
                    },
                    plotOptions: {
                        column: {
                            borderRadius: '50%',
                            pointPadding: 0.1,
                            borderWidth: 0,
                            groupPadding: 0,
                            pointWidth: 17
                        }
                    },
                    series: [{
                        data: amount
                    }],
                    colorAxis: {
                        minColor: '#3A57E8', // ฟ้า
                        maxColor: '#FF0000', // แดง
                    },
                    tooltip: {
                        formatter: function() {
                            return this.x + '<br><b>ข้อมูล ' + this.y + ' ราย</b>';
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    legend: false,
                });
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
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnpQL8i0_e09BgynT5s0PAhlYxM1G5Wrw&callback=initMap&avoid=tolls">
        </script>
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
                        lat: risk_point2 ? Number(integration_finals[0].Acc_lat) : 13.746446991671341,
                        lng: risk_point2 ? Number(integration_finals[0].Acc_long) : 100.51635883877083
                    },
                    zoom: 11,
                });

                setTimeout(function() { // แก้บัค marker รวมกันเป็นก้อน
                    if (risk_point2) {
                        map.setZoom(18);

                    } else {
                        map.setZoom(11);
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
