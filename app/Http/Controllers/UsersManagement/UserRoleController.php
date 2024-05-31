<?php

namespace App\Http\Controllers\UsersManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersManagement\UserRole;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = UserRole::all();
        return view('users_management.add_userrole',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users_management.add_userrole');
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
            'role_name' => 'required'
        ]);
        $userRole = new UserRole;
        $userRole->role_name = $request->input('role_name');
        $userRole->show_log = ($request->has('showlogs')) ? 1 : 0;
        $userRole->save();
        return redirect('userRole')->with('success','UserRole has been added successfully');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedRole = UserRole::find($id);
        $roles = UserRole::all();
        return view('users_management.update_userrole',['selectedRole' => $selectedRole,'roles' => $roles]);
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
            'role_name' => 'required'
        ]);
        $userRole = UserRole::findOrFail($id);
        $userRole->role_name = $request->input('role_name');
        $userRole->show_log = ($request->has('showlogs')) ? 1 : 0;
        if($userRole->save()){
            return redirect('userRole')->with('success','UserRole has been updated successfully');
        }else{
            return redirect('userRole')->with('failed',"Sorry we can't process your request for time being");
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
        $userRole = UserRole::findOrFail($id);
        if($userRole->delete()){
            return redirect('userRole')->with('success','UserRole has been deleted successfully');
        }else{
            return redirect('userRole')->with('failed','Sorry unable to delete the record');
        }
    }
}
