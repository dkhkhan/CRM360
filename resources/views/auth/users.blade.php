@extends('layouts.crm360');
@section('content')
    <div class="container-fluid">
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
                    <!-- Transactions -->
                    <div class="col-12 col-md-12 position-relative column-set">
                        <div class="card border-0 mb-4">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="bi bi-shop h5 avatar avatar-40 bg-light-theme rounded"></i>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <h6 class="fw-medium mb-0">Registered Users</h6>
                                        <p class="text-secondary small">All Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-borderless footable" data-show-toggle="true">
                                    <thead>
                                        <tr class="text-muted">
                                            <th class="w-12">#</th>
                                            <th style="width:15%;">Name</th>
                                            <th style="width:15%;">Email</th>
                                            <th style="width:10%;">User Role</th>
                                            <th style="width:15%;">Job Title</th>
                                            <th style="width:14%;">Mobile</th>
                                            <th style="width:15%;">Office Location</th>
                                            <th style="width:15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <p>{{ $user->name }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $user->email }}</p>
                                            </td>
                                            <td>
                                                <p>{{ ($user->role) ? $user->role->role_name : '-'}}</p>
                                            </td>
                                            <td>
                                                <p>{{ ($user->job_title) ? $user->job_title : '-'}}</p>
                                            </td>
                                            <td>
                                                <p>{{ ($user->mobile) ? $user->mobile : '-'}}</p>
                                            </td>
                                            <td>
                                                <p>{{ ($user->office_location) ? $user->office_location : '-'}}</p>
                                            </td>
                                            <td>
                                               <a href="" class="btn btn-theme"><i class="bi bi-pencil-square"></i></a>
                                               <a class="btn btn-theme bg-red" href="javascript:void(0);" onclick="if(confirm('Are you sure?')){$(this).parent('td').find('form').submit();}"><i class="bi bi-trash3"></i></a>
                                               <form action="" method="post">
                                                   @method('DELETE')
                                                   @csrf
                                               </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row align-items-center mx-0 mb-3">
                                    <div class="col-6 ">
                                        <span class="hide-if-no-paging">
                                            Showing <span id="footablestot"></span> page
                                        </span>
                                    </div>
                                    <div class="col-6" id="footable-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 mb-4 px-2">
                    <div class="card-header mb-4">
                        <h5 class="title">Add New Role</h5>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{route('custom.register')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 mb-md-0  was-validated">
                                    <div class="mb-4">
                                        <div class="form-group mb-3 position-relative check-valid @if(!$errors->get('name')) is-valid @endif">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-text text-theme border-end-0"><i class="bi bi-person"></i></span>
                                                <div class="form-floating">
                                                    <input type="text" placeholder="Enter Full Name" value="{{ old('name') }}" name="name" class="form-control border-start-0">
                                                    <label>Full Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group mb-3 position-relative check-valid  @if(!$errors->get('email')) is-valid @endif">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-text text-theme border-end-0"><i class="bi bi-envelope"></i></span>
                                                <div class="form-floating">
                                                    <input type="email" placeholder="Enter Emial" value="{{ old('email') }}" name="email" class="form-control border-start-0">
                                                    <label>Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback mb-3">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group mb-3 position-relative check-valid  @if(!$errors->get('user_role')) is-valid @endif">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-text text-theme border-end-0"><i class="bi bi-person"></i></span>
                                                <div class="form-floating">
                                                    <select class="form-select border-0" id="user_role" name="user_role" style="border-radius:0px;">
                                                        <option value="">Choose...</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" @selected(old('user_role')==$role->id)>{{ $role->role_name }}</option>
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
                                    
                                    <button class="btn btn-theme" type="submit">Add New User</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>   
    <div>
@endsection