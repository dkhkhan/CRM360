<div class="modal-content" style="border:1px solid #FFF;">
    <div class="modal-header">
      <div class="card-header">
          <div class="row">
              <div class="col-auto">
                  <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
              </div>
              <div class="col-auto align-self-center">
                  <h6 class="fw-medium mb-0">{{ $country }}</h6>
                  <p class="text-secondary small">{{ $label }}</p>
              </div>
          </div>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row mt-4">
          <div class="col-12 col-md-12 position-relative column-set">
              <div class="card border-0 mb-4">
                  <div class="card-body p-0">
                        <table class="table table-borderless footable footable-1 footable-paging footable-paging-right breakpoint breakpoint-lg" data-show-toggle="true" style="">
                            <thead>
                                <tr class="text-muted">
                                    <th class="w-12"></th>
                                    <th  class="">No</th>
                                    <th  class="">Project</th>
                                    <th data-breakpoints="xs md">Property Details</th>
                                    <th data-breakpoints="xs">Department</th>
                                    <th data-breakpoints="xs md">Source</th>
                                    <th data-breakpoints="xs md">Case Type</th>
                                    <th data-breakpoints="xs md">Created On</th>
                                    <th data-breakpoints="all" data-title="Case ID">Case ID</th>
                                    <th data-breakpoints="all" data-title="Problem Summary">Problem Summary</th>
                                    <th data-breakpoints="xs">Status</th>
                                    <th data-breakpoints="xs">KPI Status</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach($country_cases as $case)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td><p class="mb-0">{{ $count }}</p></td>
                                        <td>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <figure class="avatar avatar-50 border mb-0 coverimg rounded">
                                                        <img src="{{ asset('assets/logos/albania.png') }}" alt="">
                                                    </figure>
                                                </div>
                                                <div class="col ps-0">
                                                    <p class="mb-0">{{ $case['Country'] }}</p>
                                                    <p class="text-secondary small">{{ $case['Project'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $case['Property'] }}</p>
                                            <p class="text-secondary small">{{ $case['Unit'] }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $case['Dispatch_Group'] }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $case['Case_Source'] }}</p>
                                            <p class="text-secondary small">{{ $case['Case_Category'] }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $case['Case_Type'] }}</p>
                                            <p class="text-secondary small">{{ $case['Problem_Category_'] }}</p>
                                        </td>
                                        <td>
                                            {{ $case['Created_On'] }}
                                        </td>
                                        <td>
                                            {{ $case['Case_ID'] }}
                                        </td>
                                        <td>
                                            {{ $case['Problem_Summary'] }}
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $case['Case_Status'] }}</p>
                                        </td>
                                        <td>
                                            @php
                                                $bg_class = 'bg-orange';
                                                if($case['KPI_Status'] === 'Failed'){
                                                    $bg_class = 'bg-red';
                                                }elseif($case['KPI_Status'] === 'In-Progress'){
                                                    $bg_class = 'bg-orange';
                                                }elseif($case['KPI_Status'] === 'Succeeded'){
                                                    $bg_class = 'bg-green';
                                                } 
                                            @endphp
                                            <span class="badge badge-sm {{ $bg_class }}">{{ $case['KPI_Status'] }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        
                 </div>
              </div>
          </div>
        </div>
    </div>
  </div>