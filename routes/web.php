<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\UsersManagement\UserRoleController;
use App\Http\Controllers\UsersManagement\UserCountryController;
use App\Http\Controllers\UsersManagement\UserRoleCountryController;
use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
    //return view('welcome');
    // return view('crm360');
})->name('home')->middleware(['auth','verified']);
Route::get('/page',function(){
    return view('home');
});
Route::get('/service',function(){
    return view('service');
});

Route::resource('userRole',UserRoleController::class)->middleware(['auth','verified']);
Route::resource('userCountry',UserCountryController::class)->middleware(['auth','verified']);
Route::resource('roleCountry',UserRoleCountryController::class)->middleware(['auth','verified']);
Route::get('/dashboard',[IncidentController::class,'incidents'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/service-requests',[IncidentController::class,'service_requests'])->middleware(['auth', 'verified'])->name('service.requests');
Route::get('/ajax-service-request',[IncidentController::class,'handle_ajax_request'])->middleware(['auth','verified'])->name('incident.ajax.request');
Route::get('/service-request/gm/{country}',[IncidentController::class,'gm_service_requests'])->middleware(['auth','verified'])->name('gm.service.requests');
Route::get('/crm360_sml_login',function(){
    echo "After Login";
});

// Route::get('/dashboard', function () {
//     // return view('dashboard');
//     return view('crm360_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
