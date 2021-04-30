<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\ManagerEmployeeController;
use App\Http\Controllers\User\RequestController;
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
// Route::get('/requests', [RequestController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('requests', RequestController::class)->middleware(['auth']);
Route::resource('admin', UserController::class)->middleware(['admin']);
Route::resource('manager', ManagerController::class)->middleware((['manager']));
Route::resource('manager/employee', ManagerEmployeeController::class)->middleware((['manager']));
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
