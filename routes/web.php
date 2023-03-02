<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyBranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ViewerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/admin/')->group(function(){
    Route::view('','cms.parent');
    Route::resource('countries', CountryController::class);
    Route::post('countries-update/{id}', [CountryController::class , 'update'])->name('countries-update');

    Route::resource('cities', CityController::class);
    Route::post('cities-update/{id}', [CityController::class , 'update'])->name('cities-update');

    Route::resource('admins', AdminController::class);
    Route::post('admins-update/{id}', [AdminController::class , 'update'])->name('admins-update');
    Route::get('restoreindex', [AdminController::class, 'restoreindex'])->name('restoreindex');
    Route::get('restore/{id}', [AdminController::class, 'restore'])->name('restore');

    Route::resource('companies', CompanyController::class);
    Route::post('companies-update/{id}', [CompanyController::class , 'update'])->name('companies-update');
    Route::get('restoreindex', [CompanyController::class, 'restoreindex'])->name('restoreindex');
    Route::get('restore/{id}', [CompanyController::class, 'restore'])->name('restore');

    Route::resource('companybranchs', CompanyBranchController::class);
    Route::post('companybranchs-update/{id}', [CompanyBranchController::class , 'update'])->name('companybranchs-update');





});

