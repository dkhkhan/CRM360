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
                            <table id="gm_service_request" class="display" style="width:100%">
                                <thead>
                                    <tr>
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