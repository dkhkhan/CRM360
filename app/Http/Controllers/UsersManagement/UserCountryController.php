<?php

namespace App\Http\Controllers\UsersManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersManagement\UserCountry;

class UserCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = UserCountry::all();
        return view('users_management.add_usercountry',['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users_management.add_usercountry');
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
            'country_name' => 'required'
        ]);
        $userCountry = new UserCountry;
        $userCountry->country_name = $request->input('country_name');
        $userCountry->save();
        return redirect('userCountry')->with('success','Country has been added successfully');
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
        $selectedCountry = UserCountry::findOrFail($id);
        $countries = UserCountry::all();
        return view('users_management.update_usercountry',['selectedCountry' => $selectedCountry,'countries' => $countries]);
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
        $request->validate([
            'country_name' => 'required'
        ]);
        $userCountry = UserCountry::findOrFail($id);
        $userCountry->country_name = $request->input('country_name');
        if($userCountry->save()){
            return redirect('userCountry')->with('success','Country has been updated successfully');
        }else{
            return redirect('userCountry')->with('failed',"Sorry we can't process your request for time being");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userCountry = UserCountry::findOrFail($id);
        if($userCountry->delete()){
            return redirect('userCountry')->with('success','Country has been deleted successfully');
        }else{
            return redirect('userCountry')->with('failed','Sorry unable to delete the record');
        }
    }
}
