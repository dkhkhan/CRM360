@extends ('layouts.crm360')

@section('page_title')
  <!-- page title bar -->
  <div class="container-fluid mb-4 title-bg">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0">CRM360 Dashboard</h5>
            </div>
        </div>
    </div>
 <!-- content -->
@endsection
@section('content') 
<div class="container-fluid">
    <div class="row">
        <!-- summary blocks -->
        <div class="col-12 col-md-3 col-lg-3 col-xxl-3">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="circle-small">
                                <div id="circleprogressyellow"></div>
                                <div class="avatar h5 bg-light-yellow text-yellow rounded-circle">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <p class="text-secondary small mb-1">Total Service Requests</p>
                            <h5 class="fw-medium">{{ number_format($total_service_count) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- add column-set class to parent when customize column width dropdown added -->
        <div class="col-12 col-md-3 col-lg-3 col-xxl-3 mb-4 column-set">
            <!-- Inventory card -->
            <div class="card border-0 bg-gradient-theme-light theme-yellow h-100">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="fw-medium">
                                <i class="bi bi-box h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                Service Requests(Cases)
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="rounded bg-theme text-white p-3">
                                <p class="text-muted small mb-1">
                                    Support
                                </p>
                                <p>{{ $total_service_count > 0 ? number_format((($support_case/$total_service_count) * 100 ),2).' %' : '0 %' }}</p>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <div class="sub_severices d-flex">
                                <div class="col col-md">
                                    <p class="text-secondary small mb-0">Active Cases</p>
                                    <p>{{ $kpi_in_progress }}<small> ( {{ $support_case > 0 ? number_format( ($kpi_in_progress/$support_case) * 100,2 ).'%' : ' 0%' }} )</small></p>
                                </div>
                                <div class="col col-md">
                                    <p class="text-secondary small mb-0">Failed Cases</p>
                                    <p>{{ $kpi_failed }}<small> ( {{ $support_case > 0 ? number_format( ( $kpi_failed/$support_case ) * 100 ,2).'%' : ' 0%' }} )</small></p>
                                </div>
                            </div>
                           
                            <div class="mt-3">
                                <div class="progress h-5 mb-1 bg-light-theme">
                                    <div class="progress-bar bg-theme" role="progressbar" style="width: {{ $support_case > 0 ? ceil(($kpi_in_progress/$support_case) * 100) : 0 }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <p class="small text-secondary">Targeted Support Cases <span class="float-end">{{ number_format($support_case) }}</span></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="rounded bg-light-theme text-dark p-3">
                                <p class="text-muted small mb-1">
                                    Non<br />Support
                                </p>
                                <p>{{ $total_service_count > 0 ? number_format((($non_support_case/$total_service_count) * 100 ),2).' %' : '0 %' }}</p>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <div class="mt-3">
                                <div class="progress h-5 mb-1 bg-light-yellow">
                                    <div class="progress-bar bg-yellow" role="progressbar" style="width: {{ $total_service_count > 0 ? ceil((($non_support_case/$total_service_count)*100)) : 0 }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <p class="small text-secondary">Total Non-Support Cases <span class="float-end">{{ number_format($non_support_case) }}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md text-center">
                            <i class="bi bi-box h5 avatar avatar-30 text-green mb-2"></i>
                            <h4 class="mb-0">{{ number_format($kpi_successed) }}</h4>
                            <p class="small text-secondary">Success</p>
                        </div>
                        <div class="col col-md text-center">
                            <i class="bi bi-box h5 avatar avatar-30 text-warning mb-2"></i>
                            <h4 class="mb-0">{{ number_format($kpi_in_progress) }}</h4>
                            <p class="small text-secondary">In Progress</p>
                        </div>
                        <div class="col col-md text-center">
                            <i class="bi bi-box h5 avatar avatar-30 text-danger mb-2"></i>
                            <h4 class="mb-0">{{ number_format($kpi_failed) }}</h4>
                            <p class="small text-secondary">Failed</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer justify-content-center text-center">
                    <a href="{{ route('service.requests') }}" class="btn btn-sm btn-link text-yellow">Visit Service Request Dashboard <i class="bi bi-arrow-right vm"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection