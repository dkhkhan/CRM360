<?php
    $total_kpi                    = ( isset($all_kpi['total_kpi']) && array_key_exists('total_kpi',$all_kpi) ) ? $all_kpi['total_kpi'] : 0;
    $kpi_failed                   = ( isset($all_kpi['Expired']) && array_key_exists('Expired',$all_kpi) ) ? $all_kpi['Expired'] : 0;
    $kpi_near_sla_breach          = ( isset($all_kpi['Nearing Expiry']) && array_key_exists('Nearing Expiry',$all_kpi) ) ? $all_kpi['Nearing Expiry'] : 0;
    $kpi_near_sla_breach_extended = ( isset($all_kpi['Nearing Expiry - SLA Extended']) && array_key_exists('Nearing Expiry - SLA Extended',$all_kpi) ) ? $all_kpi['Nearing Expiry - SLA Extended'] : 0;
    $kpi_in_progress              = ( isset($all_kpi['In Progress']) && array_key_exists('In Progress',$all_kpi) ) ? $all_kpi['In Progress'] : 0;
    $kpi_in_progress_sla_extended = ( isset($all_kpi['In Progress - SLA Extended']) && array_key_exists('In Progress - SLA Extended',$all_kpi) ) ? $all_kpi['In Progress - SLA Extended'] : 0;
    $kpi_successed                = ( isset($all_kpi['Succeeded']) && array_key_exists('Succeeded',$all_kpi) ) ? $all_kpi['Succeeded'] : 0;
    $total_in_progress            = ($kpi_in_progress + $kpi_in_progress_sla_extended);
    $total_near_sla_breach        = ($kpi_near_sla_breach + $kpi_near_sla_breach_extended);
    $kpi_failed_percentag         = ( $total_kpi > 0 && $kpi_failed > 0 ) ? number_format( ($kpi_failed/$total_kpi) * 100 ) : 0;
    $kpi_near_sla_brach_percentag = ( $total_kpi > 0 && $total_near_sla_breach > 0 ) ? number_format( $total_near_sla_breach/$total_kpi * 100 ) : 0;
    $kpi_in_progress_percentag    = ( $total_kpi > 0 && $kpi_in_progress ) ? number_format( $total_in_progress/$total_kpi * 100 ) : 0;
    $kpi_successed_percentage     = ( $total_kpi > 0 && $kpi_successed > 0 ) ? number_format( $kpi_successed/$total_kpi * 100 ) : 0;
?>
<h6 class="title">SUPPORT CASES <small class="fs-12 fw-light text-secondary"><i>(Cases assigned to departments)</i></small></h4>
<div class="row" id="suport_case_main">
    <input type="hidden" value="{{ $country }}" class="suport_case_country" data-action="{{route('incident.ajax.request')}}" />
    <div class="col-12 col-md-6 col-lg mb-4 mb-lg-0">
        <div class="row align-items-center">
            <div class="col">
                <p class="small text-secondary mb-1">Total </p>
                <h4 class="fw-medium"><span class="service_total_cases" style="cursor: pointer;">{{ number_format($total_kpi) }}</span> <small class="fs-12 fw-light text-secondary service_total_case_label">Last 7 Days</small></h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-50 rounded bg-light-red">
                    <i class="bi bi-file-x-fill h5"></i>
                </div>
            </div>
            <div class="col">
                <p class="small text-secondary mb-1">Failed </p>
                <h4 class="fw-medium"><span class="service_failed_kpi" style="cursor: pointer;">{{ number_format($kpi_failed) }}</span> <small class="fs-12 fw-light text-secondary service_failed_kpi_percentage">({{ $kpi_failed_percentag.'%' }}) </small></h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg mb-4 mb-lg-0">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-50 rounded bg-light-yellow">
                    <i class="bi bi-clock-history h5"></i>
                </div>
            </div>
            <div class="col">
                <p class="small text-secondary mb-1">Near SLA Breach</p>
                <h4 class="fw-medium"><span class="service_nearing_breach_kpi" style="cursor: pointer;">{{ number_format($total_near_sla_breach) }}</span> <small class="fs-12 fw-light text-secondary service_nearing_breach_percentage">({{ $kpi_near_sla_brach_percentag.'%' }}) </small></h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg mb-4 mb-lg-0">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-50 rounded bg-light-orange">
                    <i class="bi bi-person-workspace h5"></i>
                </div>
            </div>
            <div class="col">
                <p class="small text-secondary mb-1">In Progress </p>
                <h4 class="fw-medium"><span class="service_in_progress_kpi" style="cursor: pointer;">{{ number_format($total_in_progress) }}</span> <small class="fs-12 fw-light text-secondary service_in_progress_percentage">({{ $kpi_in_progress_percentag.'%' }}) </small></h4>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg mb-4 mb-lg-0">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="avatar avatar-50 rounded bg-light-green">
                    <i class="bi bi-check-circle-fill h5"></i>
                </div>
            </div>
            <div class="col">
                <p class="small text-secondary mb-1">Resolved </p>
                <h4 class="fw-medium"><span class="service_successed_kpi" style="cursor: pointer;">{{ number_format($kpi_successed) }}</span> <small class="fs-12 fw-light text-secondary service_successed_percentage">({{ $kpi_successed_percentage.'%' }}) </small></h4>
            </div>
        </div>
    </div>
</div>