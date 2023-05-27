<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionFunctionController;
use App\Http\Controllers\PermissionModuleController;
use App\Http\Controllers\PermissionPermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth', 'permissions'])->group(function () {
    Route::resource('dashboard', DashboardController::class);

    Route::get('users/{user}/permissions', [UserController::class, 'permissions'])->name('users.permissions');
    Route::post('users/{user}/permissions', [UserController::class, 'storePermissions'])->name('users.storepermissions');
    Route::resource('users', UserController::class);
    
    Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::post('roles/{role}/permissions', [RoleController::class, 'storePermissions'])->name('roles.storepermissions');
    Route::resource('roles', RoleController::class);
    
    Route::resource('permission-modules', PermissionModuleController::class);
    Route::resource('permission-functions', PermissionFunctionController::class);
    Route::resource('permission-permissions', PermissionPermissionController::class);
});

