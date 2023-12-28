<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Incident extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv_production';
    public static function totalCases($from_date,$to_date){
        $query = Incident::select('Case Nature as case_nature',DB::raw('COUNT(*) as total_count'));
        $query->whereNotNull('Case Nature ');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereBetween(DB::raw("CAST([Created On] AS DATE)"), array($from_date,$to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $query->groupBy('Case Nature ');
        $incidents = $query->get();
        $data['non_support_case'] = 0;
        $data['support_case'] = 0;
        $data['total_service_count'] = 0;
        foreach($incidents as $incident){
            if(in_array($incident->case_nature,array('Non - Support Case','None Support Case'))){
                $data['non_support_case'] += $incident->total_count;
                $data['total_service_count'] += $incident->total_count;
            } else if(in_array($incident->case_nature,array('Refund Request','Support Case'))){
                $data['support_case'] += $incident->total_count;
                $data['total_service_count'] += $incident->total_count;
            }
        }
        $data['kpi_in_progress'] = self::inProgressKpi($from_date,$to_date);
        $data['kpi_failed'] = self::failedKpi($from_date,$to_date);
        $data['kpi_successed'] = self::successedKpi($from_date,$to_date);
        return $data;
    }
    // get all kpis by created on
    public static function allKpiTotal($from,$to,$country=''){
        $query = Incident::select('KPI Status as kpi_status',DB::raw('COUNT(*) as total_count'));
        $query->whereNotNull('Case Nature ');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature ',array('Refund Request', 'Support Case'));
        $query->whereIn('KPI Status',array('Failed', 'In-Progress', 'Nearing SLA Breach', 'Succeeded'));
        if($country){
            $query->where('country',$country);
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $query->whereBetween(DB::raw("CAST([Created On] AS DATE)"), array($from, $to));
        $query->groupBy('KPI Status');
        $all_kpi = $query->get();
        $result = array();
        $result['total_kpi'] = 0;
        if($all_kpi){
            foreach($all_kpi as $kpi){
                $result[$kpi->kpi_status] = $kpi->total_count;
                $result['total_kpi'] += $kpi->total_count;
            }
        }
        return $result;
    }
    // get all countries kpi by Failure Time
    public static function allCountriesTotalCases($from,$to,$country='',$view_type = ''){
        $query = Incident::select('Country as country','KPI Status as kpi_status',DB::raw('COUNT(*) as total_count'));
        $query->whereNotNull('Case Nature ');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature ',array('Refund Request', 'Support Case'));
        $query->whereIn('KPI Status',array('Failed', 'In-Progress', 'Nearing SLA Breach', 'Succeeded'));
        $query->whereBetween(DB::raw("CAST([Created On] AS DATE)"), array($from, $to));
        if($country){
            $query->where('country',$country);
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $query->groupBy('Country');
        $query->groupBy('KPI Status');
        $query->groupBy('Case Nature ');
        $incidents = $query->get();
        $data = array();
        $userCountries = session()->has('user_countires') ? session()->get('user_countires') : array();
        if(count($incidents) > 0){
            foreach($incidents as $incident){
                // if($incident->kpi_status == 'Failed'){
                //     $data[$incident->country][$incident->kpi_status] = self::breachedSLA($from,$to,$incident->country);    
                // }else if($incident->kpi_status == 'Nearing SLA Breach'){
                //     $data[$incident->country][$incident->kpi_status] = self::nearingBreachSLA($from,$to,$incident->country);    
                // }else if(in_array($incident->kpi_status,array('In-Progress','Succeeded'))){
                //     $data[$incident->country][$incident->kpi_status] = $incident->total_count;
                // }else{
                //     $data[$incident->country][$incident->kpi_status] = 0;
                // }

                $data[$incident->country][$incident->kpi_status] = $incident->total_count;
                if(array_key_exists('total_cases',$data[$incident->country])){
                    $data[$incident->country]['total_cases'] += $incident->total_count;
                }else{
                    $data[$incident->country]['total_cases']  = $incident->total_count;
                }
            }
        }else{
            $data[$country]['In-Progress'] = 0;
            $data[$country]['Succeeded'] = 0;
            $data[$country]['Failed'] = 0;
            $data[$country]['Nearing SLA Breach'] = 0;
            $data[$country]['total_cases'] = 0;
        }

        if($userCountries && $view_type != 'gm_view'){
            foreach($userCountries as $uCountry){
                if(!array_key_exists($uCountry,$data)){
                    $data[$uCountry]['In-Progress'] = 0;
                    $data[$uCountry]['Succeeded'] = 0;
                    $data[$uCountry]['Failed'] = 0;
                    $data[$uCountry]['Nearing SLA Breach'] = 0;
                    $data[$uCountry]['total_cases'] = 0;
                }else{
                    if(!array_key_exists('Failed',$data[$uCountry])){
                        $data[$uCountry]['Failed'] = 0;
                    }
                    if(!array_key_exists('Succeeded',$data[$uCountry])){
                        $data[$uCountry]['Succeeded'] = 0;
                    }
                    if(!array_key_exists('Nearing SLA Breach',$data[$uCountry])){
                        $data[$uCountry]['Nearing SLA Breach'] = 0;
                    }
                    if(!array_key_exists('In-Progress',$data[$uCountry])){
                        $data[$uCountry]['In-Progress'] = 0;
                    }
                }
            }
        }

        if($view_type == 'gm_view' && $country){
            if(!array_key_exists('Failed',$data[$country])){
                $data[$country]['Failed'] = 0;
            }
            if(!array_key_exists('Succeeded',$data[$country])){
                $data[$country]['Succeeded'] = 0;
            }
            if(!array_key_exists('Nearing SLA Breach',$data[$country])){
                $data[$country]['Nearing SLA Breach'] = 0;
            }
            if(!array_key_exists('In-Progress',$data[$country])){
                $data[$country]['In-Progress'] = 0;
            }
        }
        // echo '<pre />';
        // print_r($data);
        // die();
        return $data;
    }
    public static function totalKpi($condition = 'default'){
        $query = Incident::whereIn('KPI Status',array('Failed', 'In-Progress', 'Nearing SLA Breach', 'Succeeded'));
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        switch($condition){
            case "to_day":
                $query->where(DB::raw("CAST([Failure Time] as DATE)"),Carbon::now()->toDateString());
                break;
            case "yesterday":
                $query->where(DB::raw("CAST([Failure Time] as DATE)"),Carbon::yesterday()->toDateString());
                break;
            case "last_7days":
                $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array(Carbon::now()->subDays(6)->toDateString(),Carbon::now()->toDateString()));
                break;
            case "last_30days":
                $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array(Carbon::now()->subDays(29)->toDateString(), Carbon::now()->toDateString()));
                break;
            case "date_range":

                break;
            default:
                $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array(Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()));
                break;
        }
        $kpi_total = $query->count();
        return $kpi_total;
    }
    public static function failedKpi($from_date,$to_date){
        $query = Incident::where('KPI Status','Failed');
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function breachedSLA($from_date,$to_date,$country = ''){
        $query = Incident::where('KPI Status','Failed');
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date, $to_date));
        if($country){
            $query->where('country',$country);
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function nearingBreachSLA($from_date,$to_date,$country = ''){
        $query = Incident::where('KPI Status','Nearing SLA Breach');
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date, $to_date));
        if($country){
            $query->where('country',$country);
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function successedKpi($from_date,$to_date){
        $query = Incident::where('KPI Status','Succeeded');
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_successed = $query->count();
        return $kpi_successed;
    }
    public static function inProgressKpi($from_date,$to_date){
        $query = Incident::whereIn('KPI Status',array('In-Progress', 'Nearing SLA Breach'));
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_in_progress = $query->count();
        return $kpi_in_progress;
    }

    public static function getCasesByCondition($case_type = '',$country = '',$from_date = '',$to_date = '',$start='',$length='',$sortColumn = 0,$sortDirection = 'asc'){
        $query = Incident::where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotNull('country');
        $query->whereNotIn('WRAP UP CODE',array('Test Care','Test Lead'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        if($country){
            $query->where('country',$country);
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        switch($case_type){
            case "totalCases":
                $query->whereIn('KPI Status',array('Failed', 'In-Progress', 'Nearing SLA Breach', 'Succeeded'));
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case  "supportTotalCases":
                $query->whereIn('KPI Status',array('Failed', 'In-Progress', 'Nearing SLA Breach', 'Succeeded'));
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "resolvedCases":
                $query->where('KPI Status','Succeeded');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "supportResolvedCases":
                $query->where('KPI Status','Succeeded');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "inProgressCases":
                $query->where('KPI Status','In-Progress');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "supportInProgressCases":
                $query->where('KPI Status','In-Progress');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "failedCases":
                $query->where('KPI Status','Failed');
                $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date,$to_date));
                break;
            case "supportFailedCases":
                $query->where('KPI Status','Failed');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
            case "nearingSlaBreach":
                $query->where('KPI Status','Nearing SLA Breach');
                $query->whereBetween(DB::raw("CAST([Failure Time] as DATE)"), array($from_date,$to_date));
                break;
            case "supportNearing":
                $query->where('KPI Status','Nearing SLA Breach');
                $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
                break;
        }
        
        $count = $query->count();
        if($start){
            $query->offset($start);
        }
        if($length){
            $query->take($length);
        }
        if($sortDirection === 'desc'){
            switch($sortColumn){
                case 2:
                    $query->orderByDesc('Property');
                break;
                case 3:
                    $query->orderByDesc('Dispatch Group');
                break;
                case 4:
                    $query->orderByDesc('Case Source');
                break;
                case 5:
                    $query->orderByDesc('Case Type');
                break;
                case 6:
                    $query->orderByDesc(DB::raw("CAST([Created On] as DATE)"));
                break;
                case 7:
                    $query->orderByDesc(DB::raw("CAST([Failure Time] as DATE)"));
                break;
                case 8:
                    $query->orderByDesc('KPI Status');
                break;
            }
        }
        $data = $query->get()->toArray();
        $result = array();
        $result['total_records'] = $count;
        if($data){
            foreach($data as $case){
                $final_case = array();
                foreach($case as $ckey => $cval){
                    $index = str_replace(array(' ','(',')'),array('_','_','_'),$ckey);
                    $final_case[$index] = $cval;
                }
                $result['data'][] = $final_case;
            }
        }
        return $result;
    }

    public static function countryCaseTypes($from_date,$to_date,$country = '',$limit = 5){
        $query = Incident::select('Case Type','Problem Category ',DB::raw("count(distinct incidentid) as total_cases"));
        $query->whereIn('Case Type',array('Complaint','Maintenance Request','Enquiry','Suggestions'));
        $query->whereNotNull('Problem Category ');
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        if($country){
            $query->where('Country',$country);
        }
        $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
        $query->groupBy('Country');
        $query->groupBy('Case Type');
        $query->groupBy('Problem Category ');
        $query->orderBy('total_cases','DESC');
        $case_types = $query->take($limit)->get()->toArray();
     
        $result = array();
        if($case_types){
            foreach($case_types as $case){
                $case['lifetime_count'] = self::getAlltimeTotalProblemCategory($case['Case Type'],$case['Problem Category '],$country);
                $case['previous_count'] = self::getPreviousTotalProblemCategory($case['Case Type'],$case['Problem Category '],$country,$from_date,$to_date);
                $result[$case['Case Type']][] = $case;
                // $result[$case['Case Type']][$case['Problem Category ']] = 10;
            }
        }
        return $result;
    }

    private static function getAlltimeTotalProblemCategory($case_type='Complaint',$category='',$country = ''){
        $query = Incident::where('Case Type',$case_type);
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->where('Problem Category ',$category);
        if($country){
            $query->where('Country',$country);
        }
        $life_time_total = $query->distinct('incidentid')->count();
        return $life_time_total;
    }

    public static function getPreviousTotalProblemCategory($case_type = 'Complaint',$category='',$country='',$from_date='',$to_date=''){
        $date1 = Carbon::parse($from_date);
        $date2 = Carbon::parse($to_date);
        $daysDiff = $date2->diffInDays($date1);
        if($daysDiff == 0 || $daysDiff == 1){
            $new_from_date = $date1->subDays(1);
            $date1 = $new_from_date->toDateString();
            $date2 = $new_from_date->addDays($daysDiff)->toDateString();
        }else if($daysDiff > 0){
            $new_from_date = $date1->subDays($daysDiff - 1);
            $date1 = $new_from_date->toDateString();
            $date2 = $new_from_date->addDays($daysDiff - 2)->toDateString();
        }else{
            $date1 = '';
            $date2 = '';
        }
        $query = Incident::where('Case Type',$case_type);//select(DB::raw("count(distinct incidentid) as lifetime_total"));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->where('Problem Category ',$category);
        if($country){
            $query->where('Country',$country);
        }
        if($date1 !='' && $date2 != ''){
            $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($date1,$date2));
        }

        $life_time_total = $query->distinct('incidentid')->count();
        return $life_time_total;
    }
    public static function getAllCasetypeByCountry($country = '',$from_date = '',$to_date='',$start='',$length='',$sortColumn = 0,$sortDirection = 'asc'){
        $query = Incident::whereNotNull('Country');
        $query->where('Case Type','!=','Test');
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        if($country){
            $query->where('Country',$country);
        }
        
        if($from_date !='' && $to_date != ''){
            $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
        }
        $count = $query->count();
        if($start){
            $query->offset($start);
        }
        if($length){
            $query->take($length);
        }
        if($sortDirection === 'desc'){
            switch($sortColumn){
                case 2:
                    $query->orderByDesc('Property');
                break;
                case 3:
                    $query->orderByDesc('Dispatch Group');
                break;
                case 4:
                    $query->orderByDesc('Case Source');
                break;
                case 5:
                    $query->orderByDesc('Case Type');
                break;
                case 6:
                    $query->orderByDesc(DB::raw("CAST([Created On] as DATE)"));
                break;
                case 7:
                    $query->orderByDesc(DB::raw("CAST([Failure Time] as DATE)"));
                break;
                case 8:
                    $query->orderByDesc('KPI Status');
                break;
            }
        }
        $cases = $query->get()->toArray();
        $result = array();
        $result['total_records'] = $count;
        if($cases){
            foreach($cases as $case){
                $final_case = array();
                foreach($case as $ckey => $cval){
                    $index = str_replace(array(' ','(',')'),array('_','_','_'),$ckey);
                    $final_case[$index] = $cval;
                }
                $result['data'][] = $final_case;
            }
        }
        return $result;
    }

    public static function getGmCasesList($case_type = '',$category='',$country='',$from_date='',$to_date='',$start='',$length = '',$sortColumn = 0,$sortDirection = 'asc'){

        $query = Incident::where('Case Type',$case_type);
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->where('Problem Category ',$category);
        if($country){
            $query->where('Country',$country);
        }
        if($from_date !='' && $to_date != ''){
            $query->whereBetween(DB::raw("CAST([Created On] as DATE)"), array($from_date,$to_date));
        }
        $count = $query->count();
        if($start){
            $query->offset($start);
        }
        if($length){
            $query->take($length);
        }
        if($sortDirection === 'desc'){
            switch($sortColumn){
                case 2:
                    $query->orderByDesc('Property');
                break;
                case 3:
                    $query->orderByDesc('Dispatch Group');
                break;
                case 4:
                    $query->orderByDesc('Case Source');
                break;
                case 5:
                    $query->orderByDesc('Case Type');
                break;
                case 6:
                    $query->orderByDesc(DB::raw("CAST([Created On] as DATE)"));
                break;
                case 7:
                    $query->orderByDesc(DB::raw("CAST([Failure Time] as DATE)"));
                break;
                case 8:
                    $query->orderByDesc('KPI Status');
                break;
            }
        }
        $cases = $query->get()->toArray();
        $result = array();
        $result['total_records'] = $count;
        if($cases){
            foreach($cases as $case){
                $final_case = array();
                foreach($case as $ckey => $cval){
                    $index = str_replace(array(' ','(',')'),array('_','_','_'),$ckey);
                    $final_case[$index] = $cval;
                }
                $result['data'][] = $final_case;
            }
        }

       return $result;
    }
}
