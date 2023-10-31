
        <?php
        use Carbon\Carbon;
        if($all_cases){
            $count = 0;
            foreach($all_cases as $case){
                $count++;
                $country_logo = $case['Country'] == 'United Arab Emirates' ? 'uae.png' :strtolower($case['Country']).'.png';
        ?>  
        <tr>
            <td></td>
            <td>
                <p class="mb-0">{{ $count }}</p>
            </td>
            <td>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <figure class="avatar avatar-50 border mb-0 coverimg rounded">
                            <img src="{{ asset('assets/logos/'.$country_logo) }}" alt="" />
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
                <p class="mb-0">{{ date('D, d M Y',strtotime($case['Created_On'])) }}</p>
                <p class="text-secondary small">{{ date('H:i',strtotime($case['Created_On'])) }}</p>
            </td>
            <td>
                <p class="mb-0">{{ date('D, d M Y',strtotime($case['Failure_Time'])) }}</p>
                <p class="text-secondary small">{{ date('H:i',strtotime($case['Failure_Time'])) }}</p>
            </td>
            <td>{{ $case['Case_Status'] }}</td>
            <td>{{ $case['Case_ID'] }}</td>
            <td>{{ $case['Problem_Summary'] }}</td>
            <td>
                <?php
                    $bg_class = 'bg-orange';
                    if($case['KPI_Status'] === 'Failed'){
                        $bg_class = 'bg-red';
                    }elseif($case['KPI_Status'] === 'In-Progress'){
                        $bg_class = 'bg-orange';
                    }elseif($case['KPI_Status'] === 'Succeeded'){
                        $bg_class = 'bg-green';
                    }     
                ?>
                <span class="badge badge-sm {{ $bg_class }}">{{ $case['KPI_Status'] }}</span>                   
            </td>
        </tr>
        <?php 
            } 
        }
        ?>
    