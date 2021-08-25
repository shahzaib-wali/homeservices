<?php

use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Sprovider\SproviderDashboard;
use App\Http\Livewire\Customer\CustomerDashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',Home::class)->name('home');

//customer
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/customer/dashbaord',CustomerDashboard::class)
        ->name('customer.dashboard');
});

//service provider
Route::middleware(['auth:sanctum', 'verified', 'authsprovider'])->group(function (){
    Route::get('/sprovider/dashbaord',SproviderDashboard::class)
        ->name('sprovider.dashboard');
});


//admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function (){
    Route::get('/admin/dashbaord',AdminDashboard::class)
        ->name('admin.dashboard');
});

