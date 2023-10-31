@extends('layouts.crm360');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('failed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-12 col-md-12 position-relative column-set">
                        <div class="card border-0 mb-4 px-2">
                            <div class="card-header mb-4">
                                <h5 class="title">User Role Privileges </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    @foreach($roles as $role)
                                        <div class="col-12 col-md-3 col-lg-3 col-xxl-3 mb-3">
                                            <div class="card border-0 bg-gradient-theme-light theme-blue h-100">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h6 class="fw-medium">{{ $role->role_name }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @php
                                                        $role_countries = $role->countries;
                                                    @endphp
                                                    <ul class="list-group">
                                                        @forelse($role_countries as $country)
                                                            <li class="list-group-item">{{ $country->getCountryName($country->user_country_id) }}</li>
                                                            @if ($loop->last)
                                                            <li class="list-group-item">
                                                                <a href="{{ route('roleCountry.edit',$role->id) }}" class="btn bg-red">Edit</a>
                                                            </li>
                                                            @endif                                                    
                                                        @empty
                                                            <li class="list-group-item">No Country Assigned</li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 mb-4 px-2">
                    <div class="card-header mb-4">
                        <h5 class="title">Update Role Privileges</h5>
                    </div>
                    <div class="card-body p-0">
                       
                        <form action="{{ route('roleCountry.update',$selectedRole->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 was-validated">
                                    <div class="form-group mb-3 position-relative check-valid in-valid">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text text-theme border-end-0"><i class="bi bi-person"></i></span>
                                            <div class="form-floating">
                                                <select class="form-select border-0" id="user_role" name="user_role" style="border-radius:0px;" disabled>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" @selected(old('user_role',$selectedRole->id)==$role->id)>{{ $role->role_name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="user_role">User Role</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('user_role')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12 col-md-12">
                                    <div class="row checkall">
                                        @forelse($countries as $country)
                                        @if($loop->iteration == 1)
                                            <div class="col-12 col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="checkall" type="checkbox" value="" id="checkall">
                                                    <label class="form-check-label" for="checkall">
                                                      Check All
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="role_countries[]" type="checkbox" 
                                                        value="{{ $country->id }}" id="{{$country->country_name.'_'.$country->id}}"
                                                        @if(array_key_exists($country->id,$role_countries_list)) checked="checked" @endif>
                                                <label class="form-check-label" for="{{$country->country_name.'_'.$country->id}}">
                                                  {{ ($country->country_name == 'United Arab Emirates') ? 'UAE' : $country->country_name }}
                                                </label>
                                              </div>
                                        </div>
                                        @empty
                                        <div class="col-12 col-md-12">
                                            <h6 class="mb-0 text-center">No Country Found</h6>
                                        </div>
                                        @endforelse
                                        <div class="col-12 col-md-12 was-validated">
                                            <div class="check-valid"></div>
                                            @error('role_countries')
                                                <div class="invalid-feedback mb-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mt-4">
                                    <button class="btn btn-theme bg-green" type="submit">Update</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>   
    <div>
@endsection
