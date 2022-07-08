<?php

use App\Http\Requests\SalesRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

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
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

Route::get('login', [AuthController::class, 'index'])->name('login-index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('landing_page/{id}',[MemberController::class, 'index'])->name('landing_page');
Route::post('landing_page',[MemberController::class, 'store'])->name('landing_page.store');

Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::post('sales/delete-all', [SalesController::class, 'destroyAll'])->name('sales.delete-all');
    Route::resource('sales', SalesController::class);
});