@foreach($all_countries as $key => $country)
    @php
        $country_logo = $key == 'United Arab Emirates' ? 'uae.png' :strtolower($key).'.png';
    @endphp
<div class="col-12 col-md-6 col-lg-3 col-xxl-2 mb-3">
    <div class="card border-0 bg-gradient-theme-light theme-blue h-100">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="fw-medium">
                        <a href="{{ route('gm.service.requests',['country'=> $key]) }}" target="_blank">
                        <img src="{{ asset('assets/logos/'.$country_logo) }}" width="35"> &nbsp;&nbsp;
                            {{ $key }}
                        </a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" value="{{ $key }}" class="case_country" data-action="{{ route('incident.ajax.request') }}" />
            <input type="hidden" value="serviceRequest_country" class="request_type" />
            <div class="card border-0 mt-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <p class="mb-1"><span class="text-secondary">Total Cases : </span><a href="" class="total_cases">{{ $country['total_cases'] }}</a></p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <p class="text-secondary small mb-1">Resolved</p>
                            <p class="text-success"><a href="" class="resolved_cases">{{ array_key_exists('Succeeded',$country) ? $country['Succeeded'] : 0 }}</a></p>
                        </div>
                        <div class="col border-left-dashed">
                            <p class="text-secondary small mb-1">In Progress</p>
                            <p class="text-warning"><a href="" class="in_progress_cases">{{ array_key_exists('In-Progress',$country) ? $country['In-Progress'] : 0 }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @if(in_array('Nearing SLA Breach',array_keys($country)) && $country['Nearing SLA Breach'] > 0)
                <div class="card border-0 mt-2 my-card card-pluse-animation card border-0 bg-gradient-theme-light theme-yellow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="circle-small">
                                    <div id="circleprogressred"></div>
                                    <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                        <i class="bi bi-emoji-neutral"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="my-text-animation">SLA Status - Nearing</p>
                                <p class="my-title-text-animation">
                                    <a href="" class="nearing_sla_breach">{{ $country['Nearing SLA Breach'] }}<small class="text-secondary small mb-1"> Cases</small></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('Failed',array_keys($country)) && $country['Failed'] > 0)
                <div class="card border-0 mt-2 my-card card-pluse-animation card border-0 bg-gradient-theme-light theme-red">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="circle-small">
                                    <div id="circleprogressred"></div>
                                    <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                        <i class="bi bi-emoji-neutral"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="my-text-animation">SLA Status - Breached</p>
                                <p class="my-title-text-animation">
                                    <a href="" class="failed_cases">{{ $country['Failed'] }}<small class="text-secondary small mb-1"> Cases</small></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('Failed',array_keys($country)) && $country['Failed'] == 0 && in_array('Nearing SLA Breach',array_keys($country)) && $country['Nearing SLA Breach'] == 0)
                <div class="card border-0 mt-2 my-card card border-0 bg-gradient-theme-light theme-green">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="circle-small">
                                    <div id="circleprogressred"></div>
                                    <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                        <i class="bi bi-emoji-neutral"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p>No SLA Breached</p>
                                <p >Zero<small class="text-secondary small mb-1"> Cases</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endforeach
