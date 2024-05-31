<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AzureAuthController extends Controller
{
    public function loadAzureLogin(){
        if(Auth::check() && Auth::user()->is_active){
            return redirect('/dashboard');
        }else{
            return view('azure_login');
        }
    }
    public function redirectToAzure()
    {
        $authUrl = 'https://login.microsoftonline.com/' . env('AZURE_AD_TENANT_ID') . '/oauth2/v2.0/authorize' .
            '?client_id=' . env('AZURE_AD_CLIENT_ID') .
            '&response_type=code' .
            '&redirect_uri=' . urlencode(env('AZURE_AD_REDIRECT_URI')) .
            '&response_mode=query' .
            '&scope=User.Read.All';

        return redirect()->away($authUrl);
    }

    public function handleAzureCallback(Request $request)
    {
        $authCode = $request->query('code');
        
        $access_token = $this->getAccessToken($authCode);
        $userData = $this->getUser($access_token);
        // echo '<pre />';
        // print_r($userData);
        // die();
        if(array_key_exists('error',$userData)){
            return view('azure_login');
        }else{
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999). mt_rand(1000000, 9999999). $characters[rand(0, strlen($characters) - 1)];
            // shuffle the result
            $string = str_shuffle($pin);
            
            $pass = explode('@',strtolower($userData['mail']));
            $pass = $pass[0].'_crm360'.$string;

            $user = User::updateOrCreate(
                [
                    'email' => $userData['mail']
                ],
                [
                    'email' => strtolower($userData['mail']),
                    'name' => $userData['displayName'],
                    'password' => Hash::make($pass),
                    'display_name' => $userData['displayName'],
                    'given_name' => $userData['givenName'],
                    'job_title' => $userData['jobTitle'],
                    'mobile' => $userData['mobilePhone'],
                    'office_location' => $userData['officeLocation'],
                    'preferred_language' => $userData['preferredLanguage'],
                    'sur_name' => $userData['surname'],
                    'country' => $userData['country'],
                    'department' => $userData['department']
                ]
            );
            if($user->is_active == 1){
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }else{
                return redirect('/digital_team')->with('warning',"Currently you don't have access to the application, please contact with Digital Team");
            }
            
        }
    }

    private function getAccessToken($authCode)
    {
        $tokenEndpoint = 'https://login.microsoftonline.com/' . env('AZURE_AD_TENANT_ID') . '/oauth2/v2.0/token';

        $tokenParams = [
            'client_id' => env('AZURE_AD_CLIENT_ID'),
            'client_secret' => env('AZURE_AD_CLIENT_SECRET'),
            // 'scope' => 'openid profile email offline_access',
            'scope' => 'User.Read.All',
            'code' => $authCode,
            'redirect_uri' => env('AZURE_AD_REDIRECT_URI'),
            'grant_type' => 'authorization_code',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $tokenEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenParams));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);
        return $responseData['access_token'] ?? null;
    }
    private function getUser($access_token){
        // $userEndpoint = 'https://graph.microsoft.com/v1.0/me';//less details
        $userEndpoint = 'https://graph.microsoft.com/beta/me/'; //more detailed response
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userEndpoint);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$access_token));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $userData = json_decode($response, true);

        return $userData;
    }
}
