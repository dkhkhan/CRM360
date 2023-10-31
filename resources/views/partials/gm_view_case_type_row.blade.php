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
        <p class="mb-0">{{ $case['Dispatch Group'] }}</p>
    </td>
    <td>
        <p class="mb-0">{{ $case['Case Source'] }}</p>
        <p class="text-secondary small">{{ $case['Case Category'] }}</p>
    </td>
    <td>
        <p class="mb-0">{{ $case['Case Type'] }}</p>
        <p class="text-secondary small">{{ $case['Problem Category '] }}</p>
    </td>
    <td>
        <p class="mb-0">{{ date('D, d M Y',strtotime($case['Created On'])) }}</p>
        <p class="text-secondary small">{{ date('H:i',strtotime($case['Created On'])) }}</p>
    </td>
    <td>{{ $case['Case Status'] }}</td>
    <td>{{ $case['Case ID'] }}</td>
    <td>{{ $case['Problem Summary'] }}</td>
    <td>
        <?php
            $bg_class = 'bg-orange';
            if($case['KPI Status'] === 'Failed'){
                $bg_class = 'bg-red';
            }elseif($case['KPI Status'] === 'In-Progress'){
                $bg_class = 'bg-orange';
            }elseif($case['KPI Status'] === 'Succeeded'){
                $bg_class = 'bg-green';
            }     
        ?>
        <span class="badge badge-sm {{ $bg_class }}">{{ $case['KPI Status'] }}</span>                   
    </td>
</tr>
<?php 
    } 
}
?>