<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use App\Models\Package;
use App\Models\Package_detail;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/', [HomeController::class, 'index'])

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('beranda');

Route::get('users/index', [UserController::class, 'index']);
Route::post('users-add', [UserController::class, 'store']);
Route::patch('users-update', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('category/index', [CategoryController::class, 'index']);
Route::get('category/{id}/abouts-index', [CategoryController::class, 'show']);
Route::post('category/{id}/abouts-add', [CategoryController::class, 'about_store']);
Route::patch('category/{id}/abouts-update', [CategoryController::class, 'about_update']);
Route::delete('category/{id}/{id_about}', [CategoryController::class, 'about_destroy']);
Route::post('category-add', [CategoryController::class, 'store']);
Route::patch('category-update', [CategoryController::class, 'update'])->name('category-update');
Route::delete('category/{id}', [CategoryController::class, 'destroy']);

Route::get('contents/index', [ContentController::class, 'index']);
Route::post('contents-add', [ContentController::class, 'store']);
Route::patch('contents-update', [ContentController::class, 'update']);
Route::delete('contents/{id}', [ContentController::class, 'destroy']);

Route::get('packages/index', [PackageController::class, 'index']);
Route::post('packages-add', [PackageController::class, 'store']);
Route::patch('packages-update', [PackageController::class, 'update']);
Route::delete('packages/{id}', [PackageController::class, 'destroy']);
