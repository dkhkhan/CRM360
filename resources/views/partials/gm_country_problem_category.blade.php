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
            <input type="hidden" value="gm_serviceRequest_country" class="request_type" />
            <div class="card border-0 mt-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <p class="mb-1"><span class="text-secondary">Total Cases : </span><a href="" class="gm_total_cases">{{ array_sum($country) }}</a></p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <p class="text-secondary small mb-1">Resolved</p>
                            <p class="text-success"><a href="" class="gm_resolved_cases">{{ array_key_exists('Succeeded',$country) ? $country['Succeeded'] : 0 }}</a></p>
                        </div>
                        <div class="col border-left-dashed">
                            <p class="text-secondary small mb-1">In Progress</p>
                            <p class="text-warning"><a href="" class="gm_in_progress_cases">{{ array_key_exists('In-Progress',$country) ? $country['In-Progress'] : 0 }}</a></p>
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
                                    <a href="" class="gm_nearing_sla_breach">{{ $country['Nearing SLA Breach'] }}<small class="text-secondary small mb-1"> Cases</small></a></p>
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
                                    <a href="" class="gm_failed_cases">{{ $country['Failed'] }}<small class="text-secondary small mb-1"> Cases</small></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(!in_array('Failed',array_keys($country)) && !in_array('Nearing SLA Breach',array_keys($country)))
                <div class="card border-0 mt-2 my-card card-pluse-animation card border-0 bg-gradient-theme-light theme-green">
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
                                <p class="my-text-animation">No SLA Breached</p>
                                <p class="my-title-text-animation">Zero<small class="text-secondary small mb-1"> Cases</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endforeach
<!-- Top Complaint --> 
<div class="col-12 col-md-6 col-lg-3 col-xxl-2">
    <div class="card border-0">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <i class="bi bi-emoji-angry h5 avatar avatar-40 bg-light-purple text-yellow rounded"></i>
                </div>
                <div class="col">
                    <h6 class="fw-medium mb-0">Complaint</h6>
                    <p class="small text-secondary">Top Support Cases</p>
                </div>
                
            </div>
        </div>
        @if(array_key_exists('Complaint',$case_types))
            <div class="card-body px-0">
                <input type="hidden" value="Complaint" class="gm_castype" />
                <ul class="list-group list-group-flush bg-none">
                    @foreach($case_types['Complaint'] as $complaint)
                        <li class=" list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <p class="mb-0">{{ $complaint['Problem Category '] }}</p>
                                    <p class="text-secondary small">{{ $complaint['lifetime_count'] }} Lifetime</p>
                                </div>
                                <div class="col ps-0 text-end">
                                    <p class=" mb-0 mg_cat_total" data-category="{{ $complaint['Problem Category '] }}">{{ $complaint['total_cases'] }}</p>
                                    @if($complaint['previous_count'] == $complaint['total_cases'])
                                        <p class="small text-secondary">
                                            {{ $complaint['previous_count'] > 0 ? $complaint['previous_count'] : '-' }}
                                            <span style="color: #fff !important;opacity:.6;"> <i class="bi bi-dash-lg"></i> 0%</span>
                                        </p>
                                    @elseif($complaint['previous_count'] > 0 && $complaint['total_cases'] > 0)
                                        <p class="small text-secondary">
                                            {{ $complaint['previous_count'] }}
                                            <?php
                                                $percent = ( ($complaint['previous_count'] - $complaint['total_cases']) / $complaint['total_cases'] ) * 100;
                                            ?>
                                            @if($percent > 0)
                                                <span class="text-green"> <i class="bi bi-arrow-down"></i> {{ number_format($percent) }}%</span>
                                            @else
                                                <span style="color: #ff6347"> <i class="bi bi-arrow-up"></i> {{ number_format($percent) }}%</span>
                                            @endif
                                        </p> 
                                    @else
                                    <p class="small text-secondary">-</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach   
                </ul>
            </div>
        @endif
    </div>
</div>
<!-- END: Top Complaint --> 

<!-- Maintenance Request --> 
<div class="col-12 col-md-6 col-lg-3 col-xxl-2">
    <div class="card border-0">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <i class="bi bi-house-door h5 avatar avatar-40 bg-light-purple text-yellow rounded"></i>
                </div>
                <div class="col">
                    <h6 class="fw-medium mb-0">Maintenance Request</h6>
                    <p class="small text-secondary">Top Support Cases</p>
                </div>
                
            </div>
        </div>
        @if(array_key_exists('Maintenance Request',$case_types))
            <div class="card-body px-0">
                <input type="hidden" value="Maintenance Request" class="gm_castype" />
                <ul class="list-group list-group-flush bg-none">
                    @foreach($case_types['Maintenance Request'] as $maintaince)
                        <li class=" list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <p class="mb-0">{{ $maintaince['Problem Category '] }}</p>
                                    <p class="text-secondary small">{{ $maintaince['lifetime_count'] }} Lifetime</p>
                                </div>
                                <div class="col ps-0 text-end">
                                    <p class=" mb-0 mg_cat_total" data-category="{{ $maintaince['Problem Category '] }}">{{ $maintaince['total_cases'] }}</p>
                                    @if($maintaince['previous_count'] == $maintaince['total_cases'])
                                        <p class="small text-secondary">
                                            {{ $maintaince['previous_count'] > 0 ? $maintaince['previous_count'] : '-' }}
                                            <span style="color: #fff !important;opacity:.6;"> <i class="bi bi-dash-lg"></i> 0%</span>
                                        </p>
                                    @elseif($maintaince['previous_count'] > 0 && $maintaince['total_cases'] > 0)
                                        <p class="small text-secondary">
                                            {{ $maintaince['previous_count'] }}
                                            <?php
                                                $percent = ( ($maintaince['previous_count'] - $maintaince['total_cases']) / $maintaince['total_cases'] ) * 100;
                                            ?>
                                            @if($percent > 0)
                                                <span class="text-green"> <i class="bi bi-arrow-down"></i> {{ number_format($percent) }}%</span>
                                            @else
                                                <span style="color: #ff6347"> <i class="bi bi-arrow-up"></i> {{ number_format($percent) }}%</span>
                                            @endif
                                        </p> 
                                    @else
                                    <p class="small text-secondary">-</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach   
                </ul>
            </div>
        @endif
    </div>
</div>
<!-- END Maintenance Request --> 

<!-- Enquiry --> 
<div class="col-12 col-md-6 col-lg-3 col-xxl-2">
    <div class="card border-0">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <i class="bi bi-info-circle h5 avatar avatar-40 bg-light-purple text-yellow rounded"></i>
                </div>
                <div class="col">
                    <h6 class="fw-medium mb-0">Enquiry</h6>
                    <p class="small text-secondary">Top Support Cases</p>
                </div>
                
            </div>
        </div>
        @if(array_key_exists('Enquiry',$case_types))
            <div class="card-body px-0">
                <input type="hidden" value="Enquiry" class="gm_castype" />
                <ul class="list-group list-group-flush bg-none">
                    @foreach($case_types['Enquiry'] as $enquire)
                        <li class=" list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <p class="mb-0">{{ $enquire['Problem Category '] }}</p>
                                    <p class="text-secondary small">{{ $enquire['lifetime_count'] }} Lifetime</p>
                                </div>
                                <div class="col ps-0 text-end">
                                    <p class=" mb-0 mg_cat_total" data-category="{{ $enquire['Problem Category '] }}">{{ $enquire['total_cases'] }}</p>
                                    @if($enquire['previous_count'] == $enquire['total_cases'])
                                        <p class="small text-secondary">
                                            {{ $enquire['previous_count'] > 0 ? $enquire['previous_count'] : '-' }}
                                            <span style="color: #fff !important;opacity:.6;"> <i class="bi bi-dash-lg"></i> 0%</span>
                                        </p>
                                    @elseif($enquire['previous_count'] > 0 && $enquire['total_cases'] > 0)
                                        <p class="small text-secondary">
                                            {{ $enquire['previous_count'] }}
                                            <?php
                                                $percent = ( ($enquire['previous_count'] - $enquire['total_cases']) / $enquire['total_cases'] ) * 100;
                                            ?>
                                            @if($percent > 0)
                                                <span class="text-green"> <i class="bi bi-arrow-down"></i> {{ number_format($percent) }}%</span>
                                            @else
                                                <span style="color: #ff6347"> <i class="bi bi-arrow-up"></i> {{ number_format($percent) }}%</span>
                                            @endif
                                        </p> 
                                    @else
                                    <p class="small text-secondary">-</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach   
                </ul>
            </div>
        @endif
    </div>
</div>
<!-- END Enquiry --> 

<!-- Suggestions --> 
<div class="col-12 col-md-6 col-lg-3 col-xxl-2">
<div class="card border-0">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <i class="bi bi-megaphone h5 avatar avatar-40 bg-light-purple text-yellow rounded"></i>
            </div>
            <div class="col">
                <h6 class="fw-medium mb-0">Suggestions</h6>
                <p class="small text-secondary">Top Support Cases</p>
            </div>
            
        </div>
    </div>
    @if(array_key_exists('Suggestions',$case_types))
        <div class="card-body px-0">
            <input type="hidden" value="Suggestions" class="gm_castype" />
            <ul class="list-group list-group-flush bg-none">
                @foreach($case_types['Suggestions'] as $suggestion)
                    <li class=" list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <p class="mb-0 mg_cat_total" data-category="{{ $suggestion['Problem Category '] }}">{{ $suggestion['Problem Category '] }}</p>
                                <p class="text-secondary small">{{ $suggestion['lifetime_count'] }} Lifetime</p>
                            </div>
                            <div class="col ps-0 text-end">
                                <p class=" mb-0">{{ $suggestion['total_cases'] }}</p>
                                @if($suggestion['previous_count'] == $suggestion['total_cases'])
                                <p class="small text-secondary">
                                    {{ $suggestion['previous_count'] > 0 ? $suggestion['previous_count'] : '-' }}
                                    <span style="color: #fff !important;opacity:.6;"> <i class="bi bi-dash-lg"></i> 0%</span>
                                </p>
                            @elseif($suggestion['previous_count'] > 0 && $suggestion['total_cases'] > 0)
                                <p class="small text-secondary">
                                    {{ $suggestion['previous_count'] }}
                                    <?php
                                        $percent = ( ($suggestion['previous_count'] - $suggestion['total_cases']) / $suggestion['total_cases'] ) * 100;
                                    ?>
                                    @if($percent > 0)
                                        <span class="text-green"> <i class="bi bi-arrow-down"></i> {{ number_format($percent) }}%</span>
                                    @else
                                        <span style="color: #ff6347"> <i class="bi bi-arrow-up"></i> {{ number_format($percent) }}%</span>
                                    @endif
                                </p> 
                            @else
                            <p class="small text-secondary">-</p>
                            @endif
                            </div>
                        </div>
                    </li>
                @endforeach   
            </ul>
        </div>
    @endif
</div>
</div>
<!-- END Suggestions --> 