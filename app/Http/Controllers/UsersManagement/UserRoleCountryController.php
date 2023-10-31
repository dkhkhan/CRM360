<?php

namespace App\Http\Controllers\usersManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersManagement\UserRole;
use App\Models\UsersManagement\UserCountry;
use App\Models\UsersManagement\UserRoleCountry;

class UserRoleCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = UserRole::all();
        $countries = UserCountry::all();
       return view('users_management.user_role_country',array(
        'roles' => $roles,
        'countries' => $countries
       ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_role' => 'required',
            'role_countries' => ['required','array','min:1']
        ],[
            'user_role' => 'Please Choose Role from dropdownlist',
            'role_countries' => 'You need to choose atleast one'
        ]);

        $data = array();
        $countries = $request->has('role_countries') ? $request->input('role_countries') : array();
        if($countries){
            foreach($countries as $country){
                $row = array(
                    'user_role_id' => $request->input('user_role'),
                    'user_country_id' => $country,
                    'created_at' => now()
                );
                $data[] = $row;
            }
        }

        UserRoleCountry::insert($data);
        return redirect('roleCountry')->with('success','Selected Countries has been assigned to User Role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = UserRole::all();
        $selectedRole = UserRole::find($id);
        $selected_counttries = array();
        if( $selectedRole->countries->count() ){
            foreach($selectedRole->countries as $country){
                $selected_counttries[$country->user_country_id] = $country;
            }
        }
        
        $countries = UserCountry::all();
       return view('users_management.update_user_role_country',array(
        'roles' => $roles,
        'countries' => $countries,
        'selectedRole' => $selectedRole,
        'role_countries_list' => $selected_counttries
       ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        UserRoleCountry::where('user_role_id',$id)->delete();
        $data = array();
        $countries = $request->has('role_countries') ? $request->input('role_countries') : array();
        if($countries){
            foreach($countries as $country){
                $row = array(
                    'user_role_id' => $id,
                    'user_country_id' => $country,
                    'created_at' => now()
                );
                $data[] = $row;
            }
        }

        UserRoleCountry::insert($data);
        return redirect('roleCountry')->with('success','User Role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
