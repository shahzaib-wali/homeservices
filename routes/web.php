<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\ServiceCategoriesComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Sprovider\SproviderDashboard;
use App\Http\Livewire\Customer\CustomerDashboard;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
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

Route::get('service-categories',ServiceCategoriesComponent::class)
    ->name('home.service_categories');

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
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)
        ->name('admin.service_categories');
    Route::GET('/admin/service-categories/add',AdminAddServiceCategoryComponent::class)
        ->name('admin.add_service_categories');
    Route::GET('/admin/service-categories/edit/{cid}',AdminEditServiceCategoryComponent::class)
        ->name('admin.edit_service_categories');
});

