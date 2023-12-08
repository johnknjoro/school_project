<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\StudentManagementController;
use App\Http\Controllers\Apps\LecturerManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['admin']], function () {

        Route::name('user-management.')->group(function () {
            Route::resource('/user-management/users', UserManagementController::class);
            Route::resource('/user-management/students', StudentManagementController::class);
            Route::resource('/user-management/lecturers', LecturerManagementController::class);
            Route::resource('/user-management/roles', RoleManagementController::class);
            Route::resource('/user-management/permissions', PermissionManagementController::class);
        });

    });

    Route::group(['middleware' => ['student']], function () {

        Route::name('student.')->group(function () {
            Route::resource('/student/units', UnitManagementController::class);
        });
        
    });

    Route::group(['middleware' => ['lecturer']], function () {

        Route::name('lecturer.')->group(function () {
            Route::resource('/lecturer/Units', UnitManagementController::class);
        });
        
    });

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
