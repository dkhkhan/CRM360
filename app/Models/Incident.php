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
    protected $table = 'RT_Incidents';
    public static function totalCases($from_date,$to_date){
        $query = Incident::select('Case Nature as case_nature',DB::raw('COUNT(*) as total_count'));
        $query->whereNotNull('Case Nature ');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
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
    // get all Project By country
    public static function countryProjects($country){
        $query = DB::connection('sqlsrv_production')->table('PropertyMaster')->select(['Project'])->distinct();
        if($country){
            if(in_array($country,array('UAE','United Arab Emirates'))){
                $query->whereIn('Country',['UAE','United Arab Emirates']);
            }else{
                $query->where('Country',$country);
            }
        }
        $projects = $query->orderBy('Project','ASC')->get()->toArray();
        $result = [];
        if($projects){
            foreach($projects as $project){
                $result[] = $project->Project;
            }
        }
        return $result;
    }
    // get all kpis by created on
    public static function allKpiTotal($from,$to,$country='',$projects=array()){
        $query = DB::connection('sqlsrv_production')->table('RT_Incidents')->select(['CaseSLAStatus as kpi_status',DB::raw('COUNT(*) as total_count')]);
        $query->whereNotNull('country')
              ->whereNotNull('CaseSLAStatus')
              ->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'))
              ->whereNotNull('Case Nature ')
              ->where([
            ['Case Type','<>', 'Test'],
            ['Case Source','<>','Collection Process'],
            ['KPI SLA','<>','incident_eh_casecontacted_createdon']
        ]);
        $query->whereNotIn('Case Category',['Mall Related', 'Loyalty Members Services'])
              ->whereNotIn('Country',['Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'])
              ->whereNotIn('Dispatch Group',array('CRM Department Albania','CRM Department Bahrain','CRM Department Belarus','CRM Department Ethiopia','CRM Department Jordan','CRM Department Morocco','CRM Department Oman','CRM Department UAE'))
              ->whereIn('Case Nature ',['Refund Request', 'Support Case'])
              ->whereIn('CaseSLAStatus',['Expired','In Progress', 'In Progress - SLA Extended', 'Nearing Expiry','Nearing Expiry - SLA Extended','Succeeded']);
        if($country){
            if(in_array($country,array('UAE','United Arab Emirates'))){
                $query->whereIn('country',['UAE','United Arab Emirates']);
            }else{
                $query->where('country',$country);
            }
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        if($projects){
            $query->whereIn('Project',$projects);
        }
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) AS DATE)"), array($from, $to));
        $query->groupBy('CaseSLAStatus');
        $all_kpi = $query->get()->toArray();
        $result = array();
        $result['total_kpi'] = 0;
        if($all_kpi){
            foreach($all_kpi as $kpi){
                $index = ucwords($kpi->kpi_status);
                $result[$index] = $kpi->total_count;
                $result['total_kpi'] += $kpi->total_count;
            }
        }
        return $result;
    }
    // get all countries kpi by Failure Time
    public static function allCountriesTotalCases($from,$to,$country='',$projects=array(),$view_type = ''){
        $userCountries = session()->has('user_countires') ? session()->get('user_countires') : array();
        $query = DB::connection('sqlsrv_production')->table('RT_Incidents')->select(['Country as country','CaseSLAStatus as kpi_status',DB::raw('COUNT(distinct incidentid) as total_count')]);
        $query->whereNotNull('country');
        $query->whereNotNull('CaseSLAStatus');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->where([
            ['Case Type','<>', 'Test'],
            ['KPI SLA','<>','incident_eh_casecontacted_createdon'],
            ['Case Source','<>','Collection Process']
        ]);
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereNotIn('Dispatch Group',array('CRM Department Albania','CRM Department Bahrain','CRM Department Belarus','CRM Department Ethiopia','CRM Department Jordan','CRM Department Morocco','CRM Department Oman','CRM Department UAE'));
        $query->whereIn('Case Nature ',array('Refund Request', 'Support Case') );
        $query->whereIn('CaseSLAStatus',array('In Progress', 'In Progress - SLA Extended','Succeeded'));
        // $query->whereIn('CaseSLAStatus',array('Expired', 'In Progress', 'In Progress - SLA Extended', 'Nearing Expiry','Nearing Expiry - SLA Extended', 'Succeeded'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) AS DATE)"), array($from, $to));
        if($projects){
            $query->whereIn('Project',$projects);
        }
        if($country){
            if( in_array( $country, array('UAE','United Arab Emirates') ) ){
                $query->whereIn('country',array('UAE','United Arab Emirates'));
            }else{
                $query->where('country',$country);
            }
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',$userCountries);
        }
        $query->groupBy('Country');
        $query->groupBy('CaseSLAStatus');
        $query->orderBy('Country','ASC');
        $query->orderBy('CaseSLAStatus','ASC');
        $incidents = $query->get()->toArray();
        $breach_nearing = self::breachedAndNearing($from,$to,$country,$projects);
        $incidents = array_merge($incidents,$breach_nearing);
        $data = array();
        if(count($incidents) > 0){
            foreach($incidents as $incident){
                if( in_array($incident->country, array('UAE','United Arab Emirates') ) ){
                    $data['UAE'][$incident->kpi_status] = $incident->total_count;
                    if(array_key_exists('total_cases',$data['UAE'])){
                        $data['UAE']['total_cases'] += $incident->total_count;
                    }else{
                        $data['UAE']['total_cases']  = $incident->total_count;
                    }
                }else{
                    $data[$incident->country][$incident->kpi_status] = $incident->total_count;
                    if(array_key_exists('total_cases',$data[$incident->country])){
                        $data[$incident->country]['total_cases'] += $incident->total_count;
                    }else{
                        $data[$incident->country]['total_cases']  = $incident->total_count;
                    }
                }
            }
        }else{
            $data[$country]['In Progress'] = 0;
            $data[$country]['In Progress - SLA Extended'] = 0;
            $data[$country]['Succeeded'] = 0;
            $data[$country]['Expired'] = 0;
            $data[$country]['Nearing Expiry'] = 0;
            $data[$country]['Nearing Expiry - SLA Extended'] = 0;
            $data[$country]['total_cases'] = 0;
        }
       
        if($userCountries && $view_type != 'gm_view'){
            foreach($userCountries as $uCountry){
                if($uCountry == 'United Arab Emirates'){
                    continue;
                }
                if(!array_key_exists($uCountry,$data)){
                    $data[$uCountry]['In Progress'] = 0;
                    $data[$uCountry]['In Progress - SLA Extended'] = 0;
                    $data[$uCountry]['Succeeded'] = 0;
                    $data[$uCountry]['Expired'] = 0;
                    $data[$uCountry]['Nearing Expiry'] = 0;
                    $data[$uCountry]['Nearing Expiry - SLA Extended'] = 0;
                    $data[$uCountry]['total_cases'] = 0;
                }else{
                    if(!array_key_exists('Expired',$data[$uCountry])){
                        $data[$uCountry]['Expired'] = 0;
                    }
                    if(!array_key_exists('Succeeded',$data[$uCountry])){
                        $data[$uCountry]['Succeeded'] = 0;
                    }
                    if(!array_key_exists('Nearing Expiry',$data[$uCountry])){
                        $data[$uCountry]['Nearing Expiry'] = 0;
                    }
                    if(!array_key_exists('Nearing Expiry - SLA Extended',$data[$uCountry])){
                        $data[$uCountry]['Nearing Expiry - SLA Extended'] = 0;
                    }
                    if(!array_key_exists('In Progress',$data[$uCountry])){
                        $data[$uCountry]['In Progress'] = 0;
                    }
                    if(!array_key_exists('In Progress - SLA Extended',$data[$uCountry])){
                        $data[$uCountry]['In Progress - SLA Extended'] = 0;
                    }
                }
            }
        }
        if($view_type == 'gm_view' && $country){
            if(!array_key_exists('Expired',$data[$country])){
                $data[$country]['Expired'] = 0;
            }
            if(!array_key_exists('Succeeded',$data[$country])){
                $data[$country]['Succeeded'] = 0;
            }
            if(!array_key_exists('Nearing Expiry',$data[$country])){
                $data[$country]['Nearing Expiry'] = 0;
            }
            if(!array_key_exists('Nearing Expiry - SLA Extended',$data[$country])){
                $data[$country]['Nearing Expiry - SLA Extended'] = 0;
            }
            if(!array_key_exists('In Progress',$data[$country])){
                $data[$country]['In Progress'] = 0;
            }
            if(!array_key_exists('In Progress - SLA Extended',$data[$country])){
                $data[$country]['In Progress - SLA Extended'] = 0;
            }
        }
        ksort($data);
        return $data;
    }
    public static function totalKpi($condition = 'default'){
        $query = Incident::whereIn('CaseSLAStatus',array('Expired', 'In Progress','In Progress - SLA Extended', 'Nearing Expiry','Nearing Expiry - SLA Extended', 'Succeeded'));
        $query->whereNotNull('country');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        switch($condition){
            case "to_day":
                $query->where(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"),Carbon::now()->toDateString());
                break;
            case "yesterday":
                $query->where(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"),Carbon::yesterday()->toDateString());
                break;
            case "last_7days":
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array(Carbon::now()->subDays(6)->toDateString(),Carbon::now()->toDateString()));
                break;
            case "last_30days":
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array(Carbon::now()->subDays(29)->toDateString(), Carbon::now()->toDateString()));
                break;
            case "date_range":
                break;
            default:
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array(Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()));
                break;
        }
        $kpi_total = $query->count();
        return $kpi_total;
    }
    public static function breachedAndNearing($from,$to,$country = '',$projects=array()){
        $userCountries = session()->has('user_countires') ? session()->get('user_countires') : array();
        $query = DB::connection('sqlsrv_production')->table('RT_Incidents')->select(['Country as country','CaseSLAStatus as kpi_status',DB::raw('COUNT(distinct incidentid) as total_count')]);
        $query->whereNotNull('country');
        $query->whereNotNull('CaseSLAStatus');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->where([
            ['Case Type','<>', 'Test'],
            ['KPI SLA','<>','incident_eh_casecontacted_createdon'],
            ['Case Source','<>','Collection Process']
        ]);
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereNotIn('Dispatch Group',array('CRM Department Albania','CRM Department Bahrain','CRM Department Belarus','CRM Department Ethiopia','CRM Department Jordan','CRM Department Morocco','CRM Department Oman','CRM Department UAE'));
        $query->whereIn('Case Nature ',array('Refund Request', 'Support Case') );
        $query->whereIn('CaseSLAStatus',array('Expired','Nearing Expiry','Nearing Expiry - SLA Extended'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[ExpectedResolveDate]) AS DATE)"), array($from, $to));
        if($projects){
            $query->whereIn('Project',$projects);
        }
        if($country){
            if( in_array( $country, array('UAE','United Arab Emirates') ) ){
                $query->whereIn('country',array('UAE','United Arab Emirates'));
            }else{
                $query->where('country',$country);
            }
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',$userCountries);
        }
        $query->groupBy('Country');
        $query->groupBy('CaseSLAStatus');
        $query->orderBy('Country','ASC');
        $query->orderBy('CaseSLAStatus','ASC');
        $breachedAndSLA = $query->get()->toArray();
       return $breachedAndSLA;
    }
    public static function failedKpi($from_date,$to_date){
        $query = Incident::where('CaseSLAStatus','Expired');
        $query->whereNotNull('country');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function breachedSLA($from_date,$to_date,$country = ''){
        $query = Incident::where('CaseSLAStatus','Expired');
        $query->whereNotNull('country'); 
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date, $to_date));
        if($country){
            if(in_array($country,array('UAE','United Arab Emirates'))){
                $query->whereIn('country',array('UAE','United Arab Emirates'));
            }else{
                $query->where('country',$country);
            }
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function nearingBreachSLA($from_date,$to_date,$country = ''){
        $query = Incident::whereNotNull('country');
        $query->whereIn('CaseSLAStatus',array('Nearing Expiry','Nearing Expiry - SLA Extended'));
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date, $to_date));
        if($country){
            if( in_array( $country, array('UAE','United Arab Emirates') ) ){
                $query->whereIn('country',array('UAE','United Arab Emirates'));
            }else{
                $query->where('country',$country);
            }
        }
        $kpi_failed = $query->count();
        return $kpi_failed;
    }
    public static function successedKpi($from_date,$to_date){
        $query = Incident::where('CaseSLAStatus','Succeeded');
        $query->whereNotNull('country');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_successed = $query->count();
        return $kpi_successed;
    }
    public static function inProgressKpi($from_date,$to_date){
        $query = Incident::whereIn('CaseSLAStatus',array('In progress','In Progress - SLA Extended'));
        $query->whereNotNull('country');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date, $to_date));
        if(session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        $kpi_in_progress = $query->count();
        return $kpi_in_progress;
    }

    public static function getCasesByCondition($case_type = '',$country = '',$from_date = '',$to_date = '',$project=array(),$start='',$length='',$sortColumn = 0,$sortDirection = 'asc'){
        $query = Incident::where('Case Type','!=', 'Test');
        $query->whereNotIn('Case Category',array('Mall Related', 'Loyalty Members Services'));
        $query->where('Case Source','!=','Collection Process');
        $query->where('KPI SLA','!=','incident_eh_casecontacted_createdon');
        $query->whereNotNull('country');
        $query->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'));
        $query->whereNotNull('CaseSLAStatus');
        $query->whereNotIn('country',array('Eagle Hills Co.', 'Nigeria', 'Egypt', 'Ramhan Island'));
        $query->whereNotIn('Dispatch Group',array('CRM Department Albania','CRM Department Bahrain','CRM Department Belarus','CRM Department Ethiopia','CRM Department Jordan','CRM Department Morocco','CRM Department Oman','CRM Department UAE'));
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        if($project){
            $query->whereIn('Project',$project);
        }
        if($country){
            if( in_array($country,array('UAE','United Arab Emirates')) ){
                $query->whereIn('country',array('UAE','United Arab Emirates'));
            }else{
                $query->where('country',$country);
            }
        }else if($country == '' && session()->has('user_countires')){
            $query->whereIn('country',session()->get('user_countires'));
        }
        switch($case_type){
            case "totalCases":
                $query->whereIn('CaseSLAStatus',array('Expired', 'In Progress','In Progress - SLA Extended', 'Nearing Expiry',
                'Nearing Expiry - SLA Extended', 'Succeeded'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case  "supportTotalCases":
                $query->whereIn('CaseSLAStatus',array('Expired', 'In Progress','In Progress - SLA Extended', 'Nearing Expiry',
                'Nearing Expiry - SLA Extended', 'Succeeded'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "resolvedCases":
                $query->where('CaseSLAStatus','Succeeded');
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "supportResolvedCases":
                $query->where('CaseSLAStatus','Succeeded');
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "inProgressCases":
                $query->whereIn('CaseSLAStatus',array('In progress','In Progress - SLA Extended'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "supportInProgressCases":
                $query->whereIn('CaseSLAStatus',array('In progress','In Progress - SLA Extended'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "failedCases":
                $query->where('CaseSLAStatus','Expired');
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[ExpectedResolveDate]) as DATE)"), array($from_date,$to_date));
                break;
            case "supportFailedCases":
                $query->where('CaseSLAStatus','Expired');
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
                break;
            case "nearingSlaBreach":
                $query->whereIn('CaseSLAStatus',array('Nearing Expiry','Nearing Expiry - SLA Extended'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[ExpectedResolveDate]) as DATE)"), array($from_date,$to_date));
                break;
            case "supportNearing":
                $query->whereIn('CaseSLAStatus',array('Nearing Expiry','Nearing Expiry - SLA Extended'));
                $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Create On]) as DATE)"), array($from_date,$to_date));
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
                    $query->orderByDesc('CaseSLAStatus');
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

    public static function countryCaseTypes($from_date,$to_date,$country = '',$projects=array()){
        // $from_date = '2024-01-01';
        // $to_date = '2024-04-30';
        $date1 = Carbon::parse($from_date);
        $date2 = Carbon::parse($to_date);
        // echo "From Date : ".$from_date." To Date : ".$to_date;
        // echo '>>>>>>>>>>>> <br />';
        // echo "Date1 : ".$date1." Date2 : ".$date2;
        // echo "<br />>>>>>>>>>>> <br />";
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
        $qry_country = $country;
        $qry_date = "BETWEEN '".$date1."' and '".$date2."'";
        
        if(in_array($country,array('UAE','United Arab Emirates'))){
            $qry_country = "'"."UAE"."'".','."'"."United Arab Emirates"."'";
        }else{
            $qry_country = "'".$country."'";
        }
        $selected_types = array('Complaint','Maintenance Request','Enquiry','Suggestions');
        $result = array();
        $query = DB::connection('sqlsrv_production')
                ->table('RT_Incidents as incidents')
                ->select(['Case Type as case_type','Problem Category as problem_category',DB::raw('count(distinct incidentid) as total_cases'),DB::raw(
                    "(SELECT count(distinct incidentid) FROM [RT_Incidents] 
                        where CAST(DATEADD(HOUR,4,[Created On]) as DATE) $qry_date 
                        and [Case Type] = incidents.[Case Type] 
                        and [Problem Category ] = incidents.[Problem Category ]
                        and [Country] is not null 
                        and [CaseSLAStatus] is not null 
                        and [Problem Category ] is not null 
                        and [Case Nature ] in ('Refund Request', 'Support Case') 
                        and [Case Category] not in ('Mall Related', 'Loyalty Members Services') 
                        and DATEADD(HOUR, 4, [Failure Time]) is not null 
                        and [Case Type] != 'Test' 
                        and [Case Source] != 'Collection Process'
                        and [KPI SLA] !=  'incident_eh_casecontacted_createdon'
                        and [Case Type] in ('Complaint','Maintenance Request','Enquiry','Suggestions')
                        and [Country] in (".$qry_country.")
                        ) as previous_count"
                ),DB::raw(
                    "(SELECT count(distinct incidentid) 
                        FROM [RT_Incidents] 
                        where [Case Type] = incidents.[Case Type] 
                        and [Problem Category ] = incidents.[Problem Category ]
                        and [Country] is not null 
                        and [CaseSLAStatus] is not null 
                        and [Problem Category ] is not null 
                        and [Case Nature ] in ('Refund Request', 'Support Case') 
                        and [Case Category] not in ('Mall Related', 'Loyalty Members Services') 
                        and DATEADD(HOUR, 4, [Failure Time]) is not null 
                        and [Case Type] != 'Test' 
                        and [Case Source] != 'Collection Process'
                        and [KPI SLA] !=  'incident_eh_casecontacted_createdon'
                        and [Case Type] in ('Complaint','Maintenance Request','Enquiry','Suggestions')
                        and [Country] in (".$qry_country.")) as lifetime_count"
                )])
                ->whereNotNull('Country')
                ->whereNotNull('CaseSLAStatus')
                ->whereNotNull('Problem Category ')
                ->whereIn('Case Nature',['Refund Request', 'Support Case'])
                ->whereNotIn('Case Category',['Mall Related', 'Loyalty Members Services'])
                ->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'))
                ->where('Case Type','!=','Test')
                ->where('Case Source','!=','Collection Process')
                ->where('KPI SLA','!=','incident_eh_casecontacted_createdon')
                ->whereIn('Case Type',array('Complaint','Maintenance Request','Enquiry','Suggestions'))
                ->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"),[$from_date,$to_date]);
                if($projects){
                    $query->whereIn('Project',$projects);
                }
                if(in_array($country,array('UAE','United Arab Emirates'))){
                    $query->whereIn('Country',['UAE','United Arab Emirates']);
                }else{
                    $query->where('Country','=',$country);
                }
                
                $query->groupBy('Case Type','Problem Category ');
                $query->orderBy('total_cases','DESC');
                $allcase_types =  $query->get()->toArray();
                $allcase_types = json_decode(json_encode($allcase_types), true);
                $result = array();
                $enquire_count = 0;
                $complaint_count = 0;
                $maintance_count = 0;
                $suggestion_count = 0;
                $problem_category_arr = array();
               if($allcase_types){
                    foreach($allcase_types as $caseType){
                        if($caseType['case_type'] == 'Complaint' && $complaint_count < 5){
                            $complaint_count = $complaint_count + 1;
                            $result[$caseType['case_type']][] = $caseType;
                            $problem_category_arr[] = $caseType['problem_category'];
                        }else if($caseType['case_type'] == 'Maintenance Request' && $maintance_count < 5){
                            $maintance_count = $maintance_count + 1;
                            $result[$caseType['case_type']][] = $caseType;
                            $problem_category_arr[] = $caseType['problem_category'];
                        }else if($caseType['case_type'] == 'Enquiry' && $enquire_count < 5){
                            $enquire_count = $enquire_count + 1;
                            $result[$caseType['case_type']][] = $caseType;
                            $problem_category_arr[] = $caseType['problem_category'];
                        }else if($caseType['case_type'] == 'Suggestions' && $suggestion_count < 5){
                            $suggestion_count = $suggestion_count + 1;
                            $result[$caseType['case_type']][] = $caseType;
                            $problem_category_arr[] = $caseType['problem_category'];
                        }
                        // $result[$caseType->case_type]['total_cases'][] = $caseType->total_cases;
                    }
               }
               
// getting all case type problem category lifetime total
               /*$query = DB::connection('sqlsrv_production')
                ->table('RT_Incidents')
                ->select(['Case Type as case_type','Problem Category as problem_category',DB::raw('count(distinct incidentid) as lifetimetotal')])
                ->whereNotNull('Country')
                ->whereNotNull('CaseSLAStatus')
                ->whereNotNull('Problem Category ')
                ->whereIn('Case Nature',['Refund Request', 'Support Case'])
                ->whereNotIn('Case Category',['Mall Related', 'Loyalty Members Services'])
                ->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'))
                ->where('Case Type','!=','Test')
                ->where('Case Source','!=','Collection Process')
                ->where('KPI SLA','!=','incident_eh_casecontacted_createdon')
                ->whereIn('Case Type',array('Complaint','Maintenance Request','Enquiry','Suggestions'))
                ->whereIn('Problem Category ',$problem_category_arr);
                // ->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"),[$from_date,$to_date]);
                if($projects){
                    $query->whereIn('Project',$projects);
                }
                if(in_array($country,array('UAE','United Arab Emirates'))){
                    $query->whereIn('Country',['UAE','United Arab Emirates']);
                }else{
                    $query->where('Country','=',$country);
                }
                
                $query->groupBy('Case Type','Problem Category');
                $query->orderBy('lifetimetotal','DESC');
                $all_prob_category =  $query->get()->toArray();
                $probcat_enquire_count = 0;
                $probcat_complaint_count = 0;
                $probcat_maintance_count = 0;
                $probcat_suggestion_count = 0;
                $problem_category_arr = array();
                $prob_cat = array();
               if($all_prob_category){
                    foreach($all_prob_category as $probcat){
                        if($probcat->case_type == 'Complaint' && $probcat_complaint_count < 6){
                            $probcat_complaint_count = $probcat_complaint_count + 1;
                            $prob_cat[$probcat->case_type][] = $probcat;
                        }else if($probcat->case_type == 'Maintenance Request' && $probcat_maintance_count < 6){
                            $probcat_maintance_count = $probcat_maintance_count + 1;
                            $prob_cat[$probcat->case_type][] = $probcat;
                        }else if($probcat->case_type == 'Enquiry' && $probcat_enquire_count < 6){
                            $probcat_enquire_count = $probcat_enquire_count + 1;
                            $prob_cat[$probcat->case_type][] = $probcat;
                        }else if($probcat->case_type == 'Suggestions' && $probcat_suggestion_count < 6){
                            $probcat_suggestion_count = $probcat_suggestion_count + 1;
                            $prob_cat[$probcat->case_type][] = $probcat;
                        }
                        // $result[$caseType->case_type]['total_cases'][] = $caseType->total_cases;
                    }
               }
               echo '<pre />';
               print_r($result);
               echo '>>>>>>>>>>>>>>>>>';
               print_r($prob_cat);
               die();*/
        /*if($selected_types){
            foreach($selected_types as $case_type){
                
                $query = DB::connection('sqlsrv_production')
                        ->table('RT_Incidents')
                        ->select(['Case Type','Problem Category ',DB::raw('count(distinct incidentid) as total_cases')])
                        ->whereNotNull('Country')
                        ->whereNotNull('CaseSLAStatus')
                        ->whereNotNull('Problem Category ')
                        ->whereIn('Case Nature',['Refund Request', 'Support Case'])
                        ->whereNotIn('Case Category',['Mall Related', 'Loyalty Members Services'])
                        ->whereNotNull(DB::raw('DATEADD(HOUR, 4, [Failure Time])'))
                        ->where([
                            ['Case Type','=',$case_type],
                            ['Case Type','<>','Test'],
                            ['Case Source','<>','Collection Process'],
                            ['KPI SLA','<>','incident_eh_casecontacted_createdon']
                        ])
                        ->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"),[$from_date,$to_date]);
                        if($projects){
                            $query->whereIn('Project',$projects);
                        }
                        if(in_array($country,array('UAE','United Arab Emirates'))){
                            $query->whereIn('Country',['UAE','United Arab Emirates']);
                        }else{
                            $query->where('Country','=',$country);
                        }
                        
                        $query->groupBy('Case Type','Problem Category');
                        $query->orderBy('total_cases','DESC');
                $allcase_types =  $query->take($limit)->get()->toArray();
                $allcase_types = json_decode(json_encode($allcase_types), true);
                if($allcase_types){
                    foreach($allcase_types as $case){
                        $case['lifetime_count'] = 0;//self::getAlltimeTotalProblemCategory($case['Case Type'],$case['Problem Category '],$country);
                        $case['previous_count'] = 0;//self::getPreviousTotalProblemCategory($case['Case Type'],$case['Problem Category '],$country,$from_date,$to_date);
                        $result[$case['Case Type']][] = $case;
                    }
                }
            }
        }*/
        return $result;
    }

    private static function getAlltimeTotalProblemCategory($case_type='Complaint',$category='',$country = ''){
        $query = DB::connection('sqlsrv_production')
        ->table('RT_Incidents')
        ->select(DB::raw('count(distinct incidentid) as total_cases'))
        ->whereIn('Case Nature',['Refund Request', 'Support Case'])
        ->where([
            ['Case Type','=',$case_type],
            ['Problem Category ','=',$category],
            ['Case Type','<>','Test']
        ]);
        if(in_array($country,array('UAE','United Arab Emirates'))){
            $query->whereIn('Country',['UAE','United Arab Emirates']);
        }else{
            $query->where('Country','=',$country);
        }
       $query =  $query->get()->toArray()[0];
        return $query->total_cases ? $query->total_cases : 0;
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
        $query = DB::connection('sqlsrv_production')
        ->table('RT_Incidents')
        ->select(DB::raw('count(distinct incidentid) as total_cases'))
        ->whereIn('Case Nature',['Refund Request', 'Support Case'])
        ->where([
            ['Case Type','=',$case_type],
            ['Problem Category ','=',$category],
            ['Case Type','<>','Test']
        ]);
        if(in_array($country,array('UAE','United Arab Emirates'))){
            $query->whereIn('Country',['UAE','United Arab Emirates']);
        }else{
            $query->where('Country','=',$country);
        }


        if($date1 !='' && $date2 != ''){
            $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($date1,$date2));
        }
        $query =  $query->get()->toArray()[0];
        return $query->total_cases ? $query->total_cases : 0;
    }
    public static function getAllCasetypeByCountry($country = '',$from_date = '',$to_date='',$projects=array(),$start='',$length='',$sortColumn = 0,$sortDirection = 'asc'){
        $query = DB::connection('sqlsrv_production')
        ->table('RT_Incidents')
        ->whereNotNull('Country')
        ->where('Case Type','<>','Test')
        ->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        if($projects){
            $query->whereIn('Project',$projects);
        }
        if(in_array($country,array('UAE','United Arab Emirates'))){
            $query->whereIn('Country',array('UAE','United Arab Emirates'));
        }else{
            $query->where('Country',$country);
        }
        
        if($from_date !='' && $to_date != ''){
            $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
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
                    $query->orderByDesc(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"));
                break;
                case 7:
                    $query->orderByDesc(DB::raw("CAST(DATEADD(HOUR,4,[Failure Time]) as DATE)"));
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

    public static function getGmCasesList($case_type = '',$category='',$country='',$from_date='',$to_date='',$project=array(),$start='',$length = '',$sortColumn = 0,$sortDirection = 'asc'){
        $query = Incident::where('Case Type',$case_type);
        $query->whereIn('Case Nature',array('Refund Request', 'Support Case'));
        $query->where('Problem Category ',$category);
        if($project){
            $query->whereIn('Project',$project);
        }
        if(in_array($country,array('UAE','United Arab Emirates'))){
            $query->whereIn('Country',array('UAE','United Arab Emirates'));
        }else{
            $query->where('Country',$country);
        }
        if($from_date !='' && $to_date != ''){
            $query->whereBetween(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"), array($from_date,$to_date));
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
                    $query->orderByDesc(DB::raw("CAST(DATEADD(HOUR,4,[Created On]) as DATE)"));
                break;
                case 7:
                    $query->orderByDesc(DB::raw("CAST(DATEADD(HOUR,4,[Failure Time]) as DATE)"));
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
