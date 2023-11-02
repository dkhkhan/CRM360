<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Incident;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    public function incidents() : View{
        $userCountries = array();
        $logedInUser = Auth::user();
        if($logedInUser && $logedInUser->countries){
            $countries = $logedInUser->countries;
            foreach($countries as $country){
                $userCountries[] = $country->country->country_name;
            }
        }
        session(array('user_countires' => $userCountries));
        $from_date = Carbon::now()->startOfMonth()->toDateString();
        $to_date =  Carbon::now()->endOfMonth()->toDateString();
        $data = Incident::totalCases($from_date,$to_date);
        return view('crm360_dashboard', $data); 
    }

    public function service_requests() : view{
        if(Session::has('from_date')){
            Session::forget('from_date');
        }if(Session::has('to_date')){
            Session::forget('to_date');
        }
        $userCountries = array();
        $logedInUser = Auth::user();
        if($logedInUser->countries){
            $countries = $logedInUser->countries;
            foreach($countries as $country){
                $userCountries[] = $country->country->country_name;
            }
        }
        session(array('user_countires' => $userCountries));
        $from_date = Carbon::now()->subDays(6)->toDateString();
        $to_date = Carbon::now()->toDateString();
        $all_kpi = Incident::allKpiTotal($from_date,$to_date);
        $all_countries_kpi = Incident::allCountriesTotalCases($from_date,$to_date);
        $data = array(
            'all_kpi' => $all_kpi,
            'countries' => $all_countries_kpi
        );
        return view('pages.service_requests',$data);
    }

    public function gm_service_requests(Request $request,$country) : view{
        if(Session::has('from_date') && Session::has('to_date')){
            $from_date = Session::get('from_date');
            $to_date = Session::get('to_date');
            Session::forget('from_date');
            Session::forget('to_date');
        }else{
            $from_date = Carbon::now()->subDays(6)->toDateString();
            $to_date = Carbon::now()->toDateString();
        }
        $session_from_date = explode('-',$from_date);
        $session_to_date = explode('-',$to_date);
        $new_date_from = $session_from_date[1].'/'.$session_from_date[2].'/'.$session_from_date[0];
        $new_date_to = $session_to_date[1].'/'.$session_to_date[2].'/'.$session_to_date[0];
        $all_kpi = Incident::allKpiTotal($from_date,$to_date,$country);
        $country_kpi = Incident::allCountriesTotalCases($from_date,$to_date,$country);
        $case_types = Incident::countryCaseTypes($from_date,$to_date,$country);
        // $all_cases = Incident::getAllCasetypeByCountry($country,$from_date,$to_date);
        $data = array(
            'all_kpi'    => $all_kpi,
            'country_kpi'  => $country_kpi,
            'case_types' => $case_types,
            // 'all_cases'  => $all_cases,
            'country'    => $country,
            'from_date' => $new_date_from,
            'to_date' => $new_date_to
        );
        return view('pages.gm_service_request',$data);
    }
    public function handle_ajax_request(){
       $case_type       = isset($_GET['case_type']) ? $_GET['case_type'] : '';
       $case_country    = isset($_GET['case_country']) ? $_GET['case_country'] : '';
       $calendar_label  = isset($_GET['caldender_label']) ? $_GET['caldender_label'] : '';
       $request_type    = isset($_GET['request_type']) ? $_GET['request_type'] : '';
       $date_range      = isset($_GET['date_range']) ? $_GET['date_range'] : '';
       $prob_category   = isset($_GET['prob_category']) ? $_GET['prob_category'] : '';
       $start = isset($_GET['start']) ? $_GET['start'] : 0;
       $length = isset($_GET['length']) ? $_GET['length'] : 10;
       $sortColumn = isset($_GET['order']) ? $_GET['order'][0]['column'] : 0;
       $sortDirection = isset($_GET['order']) ? $_GET['order'][0]['dir'] : 'ASC';
       $date_from = Carbon::now()->subDays(6)->toDateString();
       $date_to = Carbon::now()->toDateString();
       $render = array();
        // Country case showing in popup modal
       if($request_type === 'gm_all_cases'){
        $from_date = '';
            $to_date = '';
            if($date_range){    
                list($from_date,$to_date) = explode('_to_',$date_range);
                $from_day = $from_month = $from_year = $to_day = $to_month = $to_year = '';
                if($from_date){
                    list($from_month,$from_day,$from_year) = explode('-',$from_date);
                    $date_from = $from_year.'-'.$from_month.'-'.$from_day;
                }
                list($to_date,$calendar_label) = explode('_label_',$to_date);
                if($to_date){
                    list($to_month,$to_day,$to_year) = explode('-',$to_date);
                    $date_to = $to_year.'-'.$to_month.'-'.$to_day;
                }
            }
        // echo '<pre />';
        // print_r($_REQUEST);
        // echo $_REQUEST['order'][0]['column'];
        // echo '<br />';
        // echo $_REQUEST['order'][0]['dir'];
        // die();
        $all_cases = Incident::getAllCasetypeByCountry($case_country,$date_from,$date_to,$start,$length,$sortColumn,$sortDirection);
        $data = array();
        if(array_key_exists('data',$all_cases)){
            $count = $start;
            foreach($all_cases['data'] as $key => $case){
                $count = $count + 1;
                $country_logo = $case['Country'] == 'United Arab Emirates' ? 'uae.png' :strtolower($case['Country']).'.png';
                $logo_row  = '<div class="row align-items-center"><div class="col-auto"><figure class="avatar avatar-50 border mb-0 coverimg rounded">';
                $logo_row .= "<img src=".asset('assets/logos/'.$country_logo)." alt='' /></figure></div>";
                $logo_row .= "<div class='col ps-0'><p class='mb-0'>".$case['Country']."</p>";
                $logo_row .= "<p class='text-secondary small'>".$case['Project']."</p></div>";
                $logo_row .= '</div>';
                $project_details_row = "<p class='mb-0'>".$case['Property']."</p>";
                $project_details_row .= "<p class='text-secondary small'>".$case['Unit']."</p>";
                $department_row = '<p class="mb-0">'.$case['Dispatch_Group'].'</p>';
                $source_row = '<p class="mb-0">'.$case['Case_Source'].'</p>';
                $source_row .= '<p class="text-secondary small">'.$case['Case_Category'].'</p>';
                $casetype_row = '<p class="mb-0">'.$case['Case_Type'].'</p>';
                $casetype_row .= '<p class="text-secondary small">'.$case['Problem_Category_'].'</p>';
                $createdon_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Created_On'])).'</p>';
                $createdon_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Created_On'])).'</p>';
                $failertime_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Failure_Time'])).'</p>';
                $failertime_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Failure_Time'])).'</p>';
                $bg_class = 'bg-orange';
                    if($case['KPI_Status'] === 'Failed'){
                        $bg_class = 'bg-red';
                    }elseif($case['KPI_Status'] === 'In-Progress'){
                        $bg_class = 'bg-orange';
                    }elseif($case['KPI_Status'] === 'Succeeded'){
                        $bg_class = 'bg-green';
                    }  
                $status_row = '<span class="badge badge-sm '.$bg_class.'">'.$case['KPI_Status'].'</span>';
                $nested = array();
                $nested[] = $count;
                $nested[] = $logo_row;
                $nested[] = $project_details_row;
                $nested[] = $department_row;
                $nested[] = $source_row;
                $nested[] = $casetype_row;
                $nested[] = $createdon_row;
                $nested[] = $failertime_row;
                $nested[] = $status_row;
                $data[] = $nested;
            }  
        }else{
            $data = array();
        }
        $json_data = array(
            "draw" => isset($_REQUEST['draw']) ? $_REQUEST['draw'] : 1,
            "recordsTotal" => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
            'recordsFiltered' => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
            'data' => $data
        );
        return response()->json($json_data);
       }else if($request_type === 'serviceRequest_country'){
            if($date_range){    
                list($from_date,$to_date) = explode('_to_',$date_range);
                $from_day = $from_month = $from_year = $to_day = $to_month = $to_year = '';
                if($from_date){
                    list($from_month,$from_day,$from_year) = explode('-',$from_date);
                    $date_from = $from_year.'-'.$from_month.'-'.$from_day;
                }
                list($to_date,$calendar_label) = explode('_label_',$to_date);
                if($to_date){
                    list($to_month,$to_day,$to_year) = explode('-',$to_date);
                    $date_to = $to_year.'-'.$to_month.'-'.$to_day;
                }
            }
            $all_cases = Incident::getCasesByCondition($case_type,$case_country,$date_from,$date_to,$start,$length,$sortColumn,$sortDirection);
            $count = $start;
            $data = array();
            if(array_key_exists('data',$all_cases)){
                foreach($all_cases['data'] as $key => $case){
                    $count = $count + 1;
                    $country_logo = $case['Country'] == 'United Arab Emirates' ? 'uae.png' :strtolower($case['Country']).'.png';
                    $logo_row  = '<div class="row align-items-center"><div class="col-auto"><figure class="avatar avatar-50 border mb-0 coverimg rounded">';
                    $logo_row .= "<img src=".asset('assets/logos/'.$country_logo)." alt='' /></figure></div>";
                    $logo_row .= "<div class='col ps-0'><p class='mb-0'>".$case['Country']."</p>";
                    $logo_row .= "<p class='text-secondary small'>".$case['Project']."</p></div>";
                    $logo_row .= '</div>';
                    $project_details_row = "<p class='mb-0'>".$case['Property']."</p>";
                    $project_details_row .= "<p class='text-secondary small'>".$case['Unit']."</p>";
                    $department_row = '<p class="mb-0">'.$case['Dispatch_Group'].'</p>';
                    $source_row = '<p class="mb-0">'.$case['Case_Source'].'</p>';
                    $source_row .= '<p class="text-secondary small">'.$case['Case_Category'].'</p>';
                    $casetype_row = '<p class="mb-0">'.$case['Case_Type'].'</p>';
                    $casetype_row .= '<p class="text-secondary small">'.$case['Problem_Category_'].'</p>';
                    $createdon_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Created_On'])).'</p>';
                    $createdon_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Created_On'])).'</p>';
                    $failertime_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Failure_Time'])).'</p>';
                    $failertime_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Failure_Time'])).'</p>';
                    $bg_class = 'bg-orange';
                        if($case['KPI_Status'] === 'Failed'){
                            $bg_class = 'bg-red';
                        }elseif($case['KPI_Status'] === 'In-Progress'){
                            $bg_class = 'bg-orange';
                        }elseif($case['KPI_Status'] === 'Succeeded'){
                            $bg_class = 'bg-green';
                        }  
                    $status_row = '<span class="badge badge-sm '.$bg_class.'">'.$case['KPI_Status'].'</span>';
                    $nested = array();
                    $nested[] = $count;
                    $nested[] = $logo_row;
                    $nested[] = $project_details_row;
                    $nested[] = $department_row;
                    $nested[] = $source_row;
                    $nested[] = $casetype_row;
                    $nested[] = $createdon_row;
                    $nested[] = $failertime_row;
                    $nested[] = $status_row;
                    $data[] = $nested;
                }
            }else{
                $data = array();
            }
            
            $json_data = array(
                "draw" => isset($_REQUEST['draw']) ? $_REQUEST['draw'] : 1,
                "recordsTotal" => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'recordsFiltered' => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'data' => $data
            );
            return response()->json($json_data);
            // echo '<pre />';
            // print_r($data);
            // die();
            // $modal_case_row = view('partials.modal_country_cases')->with('country_cases',$data['data'])->with('country',$case_country)->with('label',$calendar_label)->render();
            // $render['success'] = true;
            // $render['html_row'] = $modal_case_row;
       }else if($request_type === 'serviceRequest_all'){
            list($from_date,$to_date) = explode('_to_',$date_range);
            $data = Incident::allCountriesTotalCases($from_date,$to_date);
            $all_kpi = Incident::allKpiTotal($from_date,$to_date);
            $kpis = array();
            if($all_kpi){
                foreach($all_kpi as $key => $kpi){
                    $index = str_replace(array(' ','-'),array('_','_'),$key);
                    $kpis[$index] = $kpi;
                }
            }
            Session::put('from_date',$from_date);
            Session::put('to_date',$to_date);
            $all_countries_html = view('partials.service_country')->with('all_countries',$data)->render();
            $render['success'] = true;
            $render['countries_html'] = $all_countries_html;
            $render['label'] = $calendar_label;
            $render['all_kpi'] = $kpis;
       } else if($request_type === 'gm_serviceRequest_all'){
            list($date_from,$date_to) = explode('_to_',$date_range);
            $all_kpi = Incident::allKpiTotal($date_from,$date_to,$case_country);
            $kpis = array();
            if($all_kpi){
                foreach($all_kpi as $key => $kpi){
                    $index = str_replace(array(' ','-'),array('_','_'),$key);
                    $kpis[$index] = $kpi;
                }
            }
            $render['success'] = true;
            $render['all_kpi'] = $kpis;
            $render['label']   = $calendar_label;
            $country_kpi = Incident::allCountriesTotalCases($date_from,$date_to,$case_country);
            $case_types = Incident::countryCaseTypes($date_from,$date_to,$case_country);
            $all_cases = Incident::getAllCasetypeByCountry($case_country,$date_from,$date_to);
            $render['success'] = true;
            $render['load_gm_view'] = true;
            $render['calender_label'] = $calendar_label;
            $render['gm_view_html_country'] = view('partials.gm_country_problem_category',['all_countries' => $country_kpi,'case_types' => $case_types])->render();
            // $render['gm_view_html_cases_list'] = view('partials.gm_view_cases_list',['all_cases' => $all_cases])->render();
       }else if($request_type === 'gm_problem_category'){
            $from_date = '';
            $to_date = '';
            if($date_range){    
                list($from_date,$to_date) = explode('_to_',$date_range);
                $from_day = $from_month = $from_year = $to_day = $to_month = $to_year = '';
                if($from_date){
                    list($from_month,$from_day,$from_year) = explode('-',$from_date);
                    $date_from = $from_year.'-'.$from_month.'-'.$from_day;
                }
                list($to_date,$calendar_label) = explode('_label_',$to_date);
                if($to_date){
                    list($to_month,$to_day,$to_year) = explode('-',$to_date);
                    $date_to = $to_year.'-'.$to_month.'-'.$to_day;
                }
            }
            $all_cases = Incident::getGmCasesList($case_type,$prob_category,$case_country,$date_from,$date_to,$start,$length,$sortColumn,$sortDirection);
            $count = $start;
            $data = array();
            if(array_key_exists('data',$all_cases)){
                foreach($all_cases['data'] as $key => $case){
                    $count = $count + 1;
                    $country_logo = $case['Country'] == 'United Arab Emirates' ? 'uae.png' :strtolower($case['Country']).'.png';
                    $logo_row  = '<div class="row align-items-center"><div class="col-auto"><figure class="avatar avatar-50 border mb-0 coverimg rounded">';
                    $logo_row .= "<img src=".asset('assets/logos/'.$country_logo)." alt='' /></figure></div>";
                    $logo_row .= "<div class='col ps-0'><p class='mb-0'>".$case['Country']."</p>";
                    $logo_row .= "<p class='text-secondary small'>".$case['Project']."</p></div>";
                    $logo_row .= '</div>';
                    $project_details_row = "<p class='mb-0'>".$case['Property']."</p>";
                    $project_details_row .= "<p class='text-secondary small'>".$case['Unit']."</p>";
                    $department_row = '<p class="mb-0">'.$case['Dispatch_Group'].'</p>';
                    $source_row = '<p class="mb-0">'.$case['Case_Source'].'</p>';
                    $source_row .= '<p class="text-secondary small">'.$case['Case_Category'].'</p>';
                    $casetype_row = '<p class="mb-0">'.$case['Case_Type'].'</p>';
                    $casetype_row .= '<p class="text-secondary small">'.$case['Problem_Category_'].'</p>';
                    $createdon_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Created_On'])).'</p>';
                    $createdon_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Created_On'])).'</p>';
                    $failertime_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Failure_Time'])).'</p>';
                    $failertime_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Failure_Time'])).'</p>';
                    $bg_class = 'bg-orange';
                        if($case['KPI_Status'] === 'Failed'){
                            $bg_class = 'bg-red';
                        }elseif($case['KPI_Status'] === 'In-Progress'){
                            $bg_class = 'bg-orange';
                        }elseif($case['KPI_Status'] === 'Succeeded'){
                            $bg_class = 'bg-green';
                        }  
                    $status_row = '<span class="badge badge-sm '.$bg_class.'">'.$case['KPI_Status'].'</span>';
                    $nested = array();
                    $nested[] = $count;
                    $nested[] = $logo_row;
                    $nested[] = $project_details_row;
                    $nested[] = $department_row;
                    $nested[] = $source_row;
                    $nested[] = $casetype_row;
                    $nested[] = $createdon_row;
                    $nested[] = $failertime_row;
                    $nested[] = $status_row;
                    $data[] = $nested;
                }
            }else{
                $data = array();
            }
            
            $json_data = array(
                "draw" => isset($_REQUEST['draw']) ? $_REQUEST['draw'] : 1,
                "recordsTotal" => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'recordsFiltered' => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'data' => $data
            );
            return response()->json($json_data);
       }else if($request_type === 'gm_serviceRequest_country'){
            $date_from = '';
            $date_to = '';
            if($date_range){    
                list($from_date,$to_date) = explode('_to_',$date_range);
                $from_day = $from_month = $from_year = $to_day = $to_month = $to_year = '';
                if($from_date){
                    list($from_month,$from_day,$from_year) = explode('-',$from_date);
                    $date_from = $from_year.'-'.$from_month.'-'.$from_day;
                }
                list($to_date,$calendar_label) = explode('_label_',$to_date);
                if($to_date){
                    list($to_month,$to_day,$to_year) = explode('-',$to_date);
                    $date_to = $to_year.'-'.$to_month.'-'.$to_day;
                }
            }
            
            $all_cases = Incident::getCasesByCondition($case_type,$case_country,$date_from,$date_to,$start,$length,$sortColumn,$sortDirection);
            $count = $start;
            $data = array();
            if(array_key_exists('data',$all_cases)){
                foreach($all_cases['data'] as $key => $case){
                    $count = $count + 1;
                    $country_logo = $case['Country'] == 'United Arab Emirates' ? 'uae.png' :strtolower($case['Country']).'.png';
                    $logo_row  = '<div class="row align-items-center"><div class="col-auto"><figure class="avatar avatar-50 border mb-0 coverimg rounded">';
                    $logo_row .= "<img src=".asset('assets/logos/'.$country_logo)." alt='' /></figure></div>";
                    $logo_row .= "<div class='col ps-0'><p class='mb-0'>".$case['Country']."</p>";
                    $logo_row .= "<p class='text-secondary small'>".$case['Project']."</p></div>";
                    $logo_row .= '</div>';
                    $project_details_row = "<p class='mb-0'>".$case['Property']."</p>";
                    $project_details_row .= "<p class='text-secondary small'>".$case['Unit']."</p>";
                    $department_row = '<p class="mb-0">'.$case['Dispatch_Group'].'</p>';
                    $source_row = '<p class="mb-0">'.$case['Case_Source'].'</p>';
                    $source_row .= '<p class="text-secondary small">'.$case['Case_Category'].'</p>';
                    $casetype_row = '<p class="mb-0">'.$case['Case_Type'].'</p>';
                    $casetype_row .= '<p class="text-secondary small">'.$case['Problem_Category_'].'</p>';
                    $createdon_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Created_On'])).'</p>';
                    $createdon_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Created_On'])).'</p>';
                    $failertime_row = '<p class="mb-0">'.date('D, d M Y',strtotime($case['Failure_Time'])).'</p>';
                    $failertime_row .= '<p class="text-secondary small">'.date('H:i',strtotime($case['Failure_Time'])).'</p>';
                    $bg_class = 'bg-orange';
                        if($case['KPI_Status'] === 'Failed'){
                            $bg_class = 'bg-red';
                        }elseif($case['KPI_Status'] === 'In-Progress'){
                            $bg_class = 'bg-orange';
                        }elseif($case['KPI_Status'] === 'Succeeded'){
                            $bg_class = 'bg-green';
                        }  
                    $status_row = '<span class="badge badge-sm '.$bg_class.'">'.$case['KPI_Status'].'</span>';
                    $nested = array();
                    $nested[] = $count;
                    $nested[] = $logo_row;
                    $nested[] = $project_details_row;
                    $nested[] = $department_row;
                    $nested[] = $source_row;
                    $nested[] = $casetype_row;
                    $nested[] = $createdon_row;
                    $nested[] = $failertime_row;
                    $nested[] = $status_row;
                    $data[] = $nested;
                }
            }else{
                $data = array();
            }
            
            $json_data = array(
                "draw" => isset($_REQUEST['draw']) ? $_REQUEST['draw'] : 1,
                "recordsTotal" => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'recordsFiltered' => array_key_exists('total_records',$all_cases) ? $all_cases['total_records'] : 0,
                'data' => $data
            );
            return response()->json($json_data);
            // $render['success'] = true;
            // $render['html'] = view('partials.gm_view_cases_list',['all_cases' => $data ])->render();
       }
        
        return response()->json($render);
    }
}
