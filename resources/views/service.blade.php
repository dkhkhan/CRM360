@extends('layouts.crm360')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xxl-7">
        <div class="card border-0 mb-4">
            <div class="card-body">
                <h6 class="title">SUPPORT CASES <small class="fs-12 fw-light text-secondary"><i>(Cases assigned to departments)</i></small></h4>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg mb-4 mb-lg-0">
                        <div class="row align-items-center">
                            
                            <div class="col">
                                <p class="small text-secondary mb-1">Total </p>
                                <h4 class="fw-medium">12 <small class="fs-12 fw-light text-secondary">Last 7 Days</small></h4>
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
                                <h4 class="fw-medium">33 <small class="fs-12 fw-light text-secondary">(33%) </small></h4>
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
                                <p class="small text-secondary mb-1">In Progress </p>
                                <h4 class="fw-medium">22 <small class="fs-12 fw-light text-secondary">(23%) </small></h4>
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
                                <h4 class="fw-medium">23<small class="fs-12 fw-light text-secondary">(34%) </small></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xxl-2">
            <div class="card border-0 bg-gradient-theme-light theme-blue h-100">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="fw-medium">
                                <a href="">
                                <img src="assets/img/flags/albania.png"  width="35"/> &nbsp;&nbsp;
                                    Albania
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border-0 mt-3">
                        <div class="card-body" >
                            <div class="row align-items-center">
                                <p class="mb-1">
                                    <span class="text-secondary">Total Cases:</span> 
                                    <a href="">12</a>
                                </p>    
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <p class="text-secondary small mb-1">Resolved</p>
                                    <p class="text-success"><a href="">34</a></p>
                                </div>
                                <div class="col border-left-dashed">
                                    <p class="text-secondary small mb-1">In Progress</p>
                                    <p class="text-warning"><a href="">34</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection