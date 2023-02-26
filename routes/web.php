<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
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


    Route::resource('authors', AuthorController::class);
    Route::post('authors-update/{id}', [AuthorController::class , 'update'])->name('authors-update');
    
    Route::resource('categories', CategoryController::class);
    Route::post('categories-update/{id}', [CategoryController::class , 'update'])->name('categories-update');

    Route::resource('articles' , ArticleController::class);
    Route::post('articles-update/{id}' , [ArticleController::class , 'update'])->name('articles-update');

    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');
    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');

    Route::resource('sliders' , SliderController::class);
    Route::post('sliders-update/{id}' , [SliderController::class , 'update' ])->name('sliders-update');
    
    Route::resource('viewers' , ViewerController::class);
    Route::post('viewers-update/{id}' , [ViewerController::class , 'update' ])->name('viewers-update');

    Route::resource('comments' , CommentController::class);


});

