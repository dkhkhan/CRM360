@extends('layouts.crm360')
@section('content')
<?php
    $country_logo = $country == 'United Arab Emirates' ? 'uae.png' :strtolower($country).'.png';
    $from_date = $from_date;
    $to_date = $to_date;
?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xxl-7">
            <div class="card border-0 mb-4">
                <div class="card-body" id="gm_support_cases">
                    @include('partials.view_support_cases')
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xxl-5">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <h6 class="title">SUPPORT CASES DATE RANGE <small class="fs-12 fw-light text-secondary"><i>(Choose date to filter the data)</i></small></h4>
                    <div class="row align-items-center">
                        <div class="col col-sm-auto">
                            <div class="input-group input-group-md">
                                <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" data-action="{{route('incident.ajax.request')}}"/>
                                <input type="hidden" class="form-control bg-non px-0" value="Last 7 Days" id="calendarLabel" />
                                <input type="hidden" class="form-control bg-non px-0" value="{{ $country }}" id="country_name" />
                                <input type="hidden" value="{{ $country }}" class="case_country"/>
                                <input type="hidden" value="gm_serviceRequest_all" class="date_request_type" />
                                <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row ajax_service_requests">
            {{-- @if($country_kpi) --}}
                @include('partials.gm_country_problem_category',['all_countries' => $country_kpi,$case_types])
            {{-- @endif --}}
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xxl-2">&nbsp;</div>
    </div>
    <div class="row" id="gm_view_cases_list">
        <div class="col-12 col-md-12 position-relative">
            <div class="card border-0 mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{ asset('assets/logos/'.$country_logo) }}"  width="35"/>
                        </div>
                        <div class="col-auto align-self-center">
                            <h6 class="fw-medium mb-0">{{ $country }}</h6>
                            <p class="text-secondary small"><span class="gm_case_list_view_label">Last 7 Days</span></p>
                        </div>    
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="gm_service_request" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="sorting_disabled">No</th>
                                        <th>Project</th>
                                        <th>Property Details</th>
                                        <th>Department</th>
                                        <th>Source</th>
                                        <th>Case Type</th>
                                        <th>Created On</th>
                                        <th>Failure Date</th>
                                        <th>KPI Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
    $(window).on('load',function(){
        loadDataTable();
        var from_date = '{{ $from_date }}';
        var to_date = '{{ $to_date }}';
        $("#titlecalendar").daterangepicker(
            {
                minYear: 1989,
                maxYear: 2025,
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [
                        moment().startOf("month"),
                        moment().endOf("month"),
                    ],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
                startDate: from_date,//moment().subtract(6, "days"),
                endDate: to_date,//moment(),
                opens: "left",
                drops: "down",
                applyButtonClasses: "btn-theme",
                cancelClass: "btn-outline-secondary border",
            },
            function (start, end, label) {
                $("input#calendarLabel").val(label);
                var url = $("input#titlecalendar").data("action");
                var $request_type = $(".date_request_type").val();
                var $case_country = $(".case_country").val();
                const $daterange =
                    start.format("YYYY-MM-DD") + "_to_" + end.format("YYYY-MM-DD");
                var $data = {
                    date_range: $daterange,
                    caldender_label: label,
                    request_type: $request_type,
                    case_country: $case_country,
                };
                $.ajax({
                    url: url,
                    method: "GET",
                    dataType: "json",
                    data: $data,
                    beforeSend: function () {
                        $(".loader-wrap").css("display", "block");
                    },
                    success: function ($response) {
                        if ($response.load_gm_view) {
                            $(".ajax_service_requests").html(
                                $response.gm_view_html_country
                            );
                            loadDataTable();
                            // $(".gm_cases_list").html(
                            //     $response.gm_view_html_cases_list
                            // );
                            // //.trigger("footable_redraw");
                            // $($response.calender_label)
                            //     ? $("span.gm_case_list_view_label").html(
                            //         $response.calender_label
                            //     )
                            //     : "Last 7 Days";

                            // $('body').find("table.table").footable();
                        }
                        var $failed_kpi_percentage = 0;
                        var $near_sla_breach_percentage = 0;
                        var $in_progress_kpi_percentage = 0;
                        var $successed_kpi_percentage = 0;
                        var kpi_failed =
                            $response.all_kpi.Failed > 0
                                ? $response.all_kpi.Failed
                                : 0;
                        var sla_breach =
                            $response.all_kpi.Nearing_SLA_Breach > 0
                                ? $response.all_kpi.Nearing_SLA_Breach
                                : 0;
                        var in_progress =
                            $response.all_kpi.In_Progress > 0
                                ? $response.all_kpi.In_Progress
                                : 0;
                        var successed =
                            $response.all_kpi.Succeeded > 0
                                ? $response.all_kpi.Succeeded
                                : 0;
                        var total_kpi =
                            $response.all_kpi.total_kpi > 0
                                ? $response.all_kpi.total_kpi
                                : 0;
                        if ($response.success) {
                            $failed_kpi_percentage =
                                total_kpi > 0 ? (kpi_failed / total_kpi) * 100 : 0;
                            $near_sla_breach_percentage =
                                total_kpi > 0 ? (sla_breach / total_kpi) * 100 : 0;
                            $in_progress_kpi_percentage =
                                total_kpi > 0 ? (in_progress / total_kpi) * 100 : 0;
                            $successed_kpi_percentage =
                                total_kpi > 0 ? (successed / total_kpi) * 100 : 0;

                            $("small.service_total_case_label").html(
                                "(" + $response.label + ")"
                            );

                            $("small.service_failed_kpi_percentage").html(
                                "(" + $failed_kpi_percentage.toFixed(2) + "%)"
                            );
                            $("small.service_nearing_breach_percentage").html(
                                "(" + $near_sla_breach_percentage.toFixed(2) + "%)"
                            );
                            $("small.service_in_progress_percentage").html(
                                "(" + $in_progress_kpi_percentage.toFixed(2) + "%)"
                            );
                            $("small.service_successed_percentage").html(
                                "(" + $successed_kpi_percentage.toFixed(2) + "%)"
                            );
                            $("span.service_total_cases").html(total_kpi);
                            $("span.service_failed_kpi").html(kpi_failed);
                            $("span.service_nearing_breach_kpi").html(sla_breach);
                            $("span.service_in_progress_kpi").html(in_progress);
                            $("span.service_successed_kpi").html(successed);
                            // load ajax response for all countries section
                            $("div.ajax_service_requests").html(
                                $response.countries_html
                            );
                        }
                        // }
                    },
                    complete: function () {
                        $(".loader-wrap").css("display", "none");
                    },
                    error: function (error) {
                        console.log("Error Occured");
                    },
                });
            }
        );

        function loadDataTable(){
            var $calenderLabel = $("input#calendarLabel").val();
            var $date_range =
                $("input#titlecalendar")
                    .val()
                    .replace(" - ", "_to_")
                    .replaceAll("/", "-") +
                "_label_" +
                $calenderLabel;
            $('#gm_service_request').DataTable({
                ajax: {
                    url: $("input#titlecalendar").data("action"),
                    data: function (d) {
                        d.request_type = 'gm_all_cases';
                        d.date_range = $date_range;
                        d.case_country = $('#country_name').val();
                    }
                },
                processing: true,
                serverSide: true,
                searching : false,
                lengthChange : false,
                bDestroy: true,
                columnDefs: [
                    { orderable: false, targets: [0] },
                    { orderable: false, targets: [1] }
                ]
            });
        }

    });
    
    </script>
@endsection