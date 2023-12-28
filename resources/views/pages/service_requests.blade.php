@extends('layouts.crm360')
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xxl-7">
            <div class="card border-0 mb-4">
                <div class="card-body">
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
                                <input type="hidden" value="serviceRequest_all" class="date_request_type" />
                                <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row ajax_service_requests">
       @include('partials.service_country',['all_countries' => $countries])
    </div>
    
</div>
<div class="modal fade" id="CountryCasesModal" tabindex="-1" aria-labelledby="CountryCasesModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl modal_show_total_case">
    <div class="modal-content" style="border:1px solid #FFF;">
        <div class="modal-header">
          <div class="card-header">
              <div class="row">
                  <div class="col-auto">
                      <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                  </div>
                  <div class="col-auto align-self-center">
                      <h6 class="fw-medium mb-0 modal-country">Country</h6>
                      <p class="text-secondary small modal-date-label">The country</p>
                  </div>
              </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-md-12 position-relative column-set">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <table id="service_request" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No</th>
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
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
    $(window).on('load',function(){
        let table;
        $("body").on(
        "click",
        "a.total_cases,a.resolved_cases,a.in_progress_cases,a.failed_cases,a.nearing_sla_breach",
        function (e) {
            e.preventDefault();
            $(".loader-wrap").css("display", "block");
            $(document).on("ajaxComplete", function () {
                $(".loader-wrap").css("display", "none");
            });
            $("#CountryCasesModal").modal("show");
            var $_this = $(this).parents(".card-body");
            var $case_country = $_this.find(".case_country").val();
            var $request_type = $_this.find(".request_type").val();
            var $calenderLabel = $("input#calendarLabel").val();
            var $date_range =
                $("input#titlecalendar")
                    .val()
                    .replace(" - ", "_to_")
                    .replaceAll("/", "-") +
                "_label_" +
                $calenderLabel;
            var $case_type = "";
            if ($(this).hasClass("total_cases")) {
                $case_type = "totalCases";
            } else if ($(this).hasClass("resolved_cases")) {
                $case_type = "resolvedCases";
            } else if ($(this).hasClass("in_progress_cases")) {
                $case_type = "inProgressCases";
            } else if ($(this).hasClass("failed_cases")) {
                $case_type = "failedCases";
            } else if ($(this).hasClass("nearing_sla_breach")) {
                $case_type = "nearingSlaBreach";
            }
            const url = $_this.find(".case_country").data("action");
            $("body").find(".modal-country").html($case_country);
            $("body").find(".modal-date-label").html($calenderLabel);
            table = new DataTable("#service_request", {
                ajax: {
                    url: url,
                    data: function (d) {
                        d.case_type = $case_type;
                        d.case_country = $case_country;
                        d.caldender_label = $calenderLabel;
                        d.request_type = $request_type;
                        d.date_range = $date_range;
                    },
                },
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                bDestroy: true,
                columnDefs: [
                    { orderable: false, targets: [0] },
                    { orderable: false, targets: [1] },
                    { orderable: false, targets: [2] },
                ],
                columns: [
                    {
                        data: null,
                        className: "dt-control",
                        defaultContent: "",
                        orderable: false,
                    },
                    { data: "count_row" },
                    { data: "logo_row" },
                    { data: "project_details_row" },
                    { data: "department_row" },
                    { data: "source_row" },
                    { data: "casetype_row" },
                    { data: "createdon_row" },
                    { data: "failertime_row" },
                    { data: "status_row" },
                ],
            });
        }
    );
        function format(d) {
            return '<table cellpadding="5" cellspacing="0"' 
                + ' style="padding-left:50px;">' + 
                '<tr>' + 
                '<td>Case ID:</td>' + 
                '<td>' + d.case_id + '</td>' + 
                '</tr>' + 
                '<tr>' + 
                '<td>Problem Summary:</td>' + 
                '<td>' + d.problem_summary + '</td>' + 
                '</tr>' + 
                '<tr>' + 
                '<td>Priority:</td>' + 
                '<td>' + d.priority + '</td>' + 
                '</tr>' + 
                '</table>'; 
        }

        // Add event listener for opening and closing details
        $('table#service_request').on('click', 'td.dt-control', function (e) {
            console.log("Called");
            let tr = e.target.closest('tr');
            let row = table.row(tr);
        
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });

    });
    
    </script>
@endsection